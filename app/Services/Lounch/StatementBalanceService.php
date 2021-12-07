<?php
namespace App\Services\Lounch;

use App\Models\Lounch;
use App\Models\UserAccount;
use App\Repositories\UserAccountRepository;
use App\Services\ServiceInterface;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

final class StatementBalanceService implements ServiceInterface
{

    /**
     *
     * @param array $data
     * @return UserAccount
     */
    public static function run($data): UserAccount
    {

        DB::beginTransaction();

        $accountRepository = new UserAccountRepository();
        $account = $accountRepository->findBy('number',$data['data']['user_account']);

        if($account==null){
            throw new Exception("Account not found.");
        }
        if($account->user_id != $data['user_id']){
            throw new Exception("Account does not belong to this user.");
        }

        $lounchs =  Lounch::where('user_account_id', "=" ,$account->id)
                           ->where('created_at', "<=" ,  $data['data']['date'])
                           ->get();
        $statement = 0;
        foreach($lounchs as $lounch){
            $statement = $lounch->type == 'credit' ? $statement - $lounch->value : $statement + $lounch->value;
        }
        $account->balance = $statement;
        DB::commit();

        return (object)$account;
    }

}
