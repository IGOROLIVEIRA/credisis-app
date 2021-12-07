<?php
namespace App\Services\Lounch;

use App\Models\Lounch;
use App\Repositories\UserAccountRepository;
use App\Validators\LounchValidator;
use App\Repositories\LounchRepository;
use App\Services\ServiceInterface;
use Exception;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

final class CreateDepositService implements ServiceInterface
{

    /**
     * Update a Lounch
     *
     * @param array $data
     * @return Lounch
     */
    public static function run($data): bool
    {
        $lounchRepository = new LounchRepository();
        $lounchValidator = new LounchValidator($data['data']);
        $lounchValidator->validate();

        DB::beginTransaction();

        if($data['data']['value'] <= 0){
            throw new Exception("Value less or equal to ZERO");
        }

        $accountRepository = new UserAccountRepository();
        $value = $data['data']['value'];
        $lot = (string) Uuid::uuid4();

        $accountDebit = $accountRepository->findBy('number',$data['data']['user_account_debit']);
        if($accountDebit==null){
            throw new Exception("Debit account not found.");
        }

        if($data['data']['type'] != 'credit' && $data['data']['type'] != 'debit') {
            throw new Exception("Incorrect type use CREDIT or DEBIT.");
        }

        $lounchDebit = [
            'value' => $value,
            'type' => 'debit',
            'user_account_id' => $accountDebit->id,
            'description' => $data['data']['description'],
            'system' => $data['data']['system'],
            'lot' => $lot
        ];
        $lounchRepository->create($lounchDebit);
        $accountDebitBalance = [ "balance" => $accountDebit->balance += $value];
        $accountRepository->update($accountDebitBalance, $accountDebit->id);

        DB::commit();

        return true;
    }

}
