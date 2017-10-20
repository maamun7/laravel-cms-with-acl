<?php namespace App\Repositories\Admin\User;

use App\DB\Admin\User;
use App\DB\Permission;

class EloquentUserRepository implements UserRepository
{
    protected $user;
    function __construct(User $user)
    {
        $this->user = $user;
    }


    /**
     * @param int $status
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getAllUser($status = 1, $order_by = 'id', $sort = 'asc')
    {
        User::where('status', $status)->orderBy($order_by, $sort)->get();
    }

    /**
     * @param $per_page
     * @param int $status
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getUserPaginated($per_page, $status = 1, $order_by = 'id', $sort = 'asc')
    {
        return User::with('roles')->where('status', $status)->orderBy($order_by, $sort)->paginate($per_page);
    }

    /**
     * @param $input
     * @param $roles
     * @return mixed
     */
    public function create($input, $roles)
    {
        $user = $this->createUserStub($input);

        if ($user->save()) {
            //Attach new roles
            $user->roles()->sync([$roles['user_role']]);
            return true;
        }
    }

    /**
     * @param $input
     * @return mixed
     */
    private function createUserStub($input)
    {
        $user = new User;
        $user->first_name = $input['first_name'];
        $user->last_name = $input['last_name'];
        $user->email = $input['email'];
        $user->password = bcrypt($input['password']);
        $user->mobile = $input['mobile'];
        $user->user_type = $input['user_type'];
        $user->status = 1;
        return $user;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findOrThrowException($id)
    {
        $user = User::with('roles')->find($id);

        if (! is_null($user)) return $user;

        throw new GeneralException('That user does not exist.');
    }

    public function update($id, $input, $roles) {
        $user = $this->updateUserStub($id,$input);
        $this->checkUserByEmail($input, $user);
        if ($user->save($input)) {
            //Attach new roles
            $user->roles()->sync([$roles['user_role']]);
            return true;
        }

        throw new GeneralException('There was a problem updating this user. Please try again.');
    }

    private function updateUserStub($id,$input)
    {
        $user = $this->findOrThrowException($id);
        $user->first_name = $input['first_name'];
        $user->last_name = $input['last_name'];
        $user->email = $input['email'];
        $user->password = bcrypt($input['password']);
        $user->mobile = $input['mobile'];
        $user->user_type = $input['user_type'];
        return $user;
    }

    /**
     * @param $input
     * @param $user
     * @throws GeneralException
     */
    private function checkUserByEmail($input, $user)
    {
        //Figure out if email is not the same
        if ($user->email != $input['email'])
        {
            //Check to see if email exists
            if (User::where('email', '=', $input['email'])->first())
                throw new GeneralException('That email address belongs to a different user.');
        }
    }
    /**
     * @param $id
     * @return mixed|void
     */
    public function delete($id) {

        $user = $this->user->findOrFail($id);
        $user->roles()->detach();
        $user->delete();
    }

}
