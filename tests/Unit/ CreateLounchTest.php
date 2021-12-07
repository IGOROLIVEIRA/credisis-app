<?php

namespace Tests\Unit;

use App\Repositories\LounchRepository;
use Ramsey\Uuid\Uuid;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class  CreateLounchTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Testing if lounch Repository is creating lounch correctly
     *
     * @return void
     */
    public function test_lounch_repository_is_creating_lounch()
    {
        $louncuRepository = new LounchRepository();
        $lot = (string) Uuid::uuid4();
        $lounchDebit = [
            'value' => 100,
            'type' => 'debit',
            'user_account_id' => 1,
            'description' => "Deposito inicial",
            'system' => "mobile",
            'lot' => $lot
        ];
        $lounch = $louncuRepository->create($lounchDebit);
        $this->assertNotEmpty($lounch);
    }
}
