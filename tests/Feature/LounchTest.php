<?php

namespace Tests\Feature;


use Illuminate\Foundation\Testing\DatabaseTransactions;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class LounchTest extends TestCase
{
    use DatabaseTransactions;

    /**
     *
     * @return void
     */
    public function test_transfer_without_balance()
    {
        $payload = [
            "value" => 300,
            "type" => "credit",
            "user_account_debit" => "0000123-4",
            "user_account_credit" => "0000124-4",
            "description" => "Transferência para PinBom",
            "system" => "mobile"
        ];

        $response = $this->post('/api/transfer/1', $payload);
        $data = $response->getOriginalContent();

        $response->assertStatus(Response::HTTP_NOT_ACCEPTABLE);
        $this->assertEquals('Balance is not enough', $data["errors"]);
    }

    /**
     *
     * @return void
     */
    public function test_transfer_value_less_than_or_equal_to_zero()
    {
        $payload = [
            "value" => -0,
            "type" => "credit",
            "user_account_debit" => "0000123-4",
            "user_account_credit" => "0000124-4",
            "description" => "Transferência para PinBom",
            "system" => "mobile"
        ];

        $response = $this->post('/api/transfer/1', $payload);
        $data = $response->getOriginalContent();

        $response->assertStatus(Response::HTTP_NOT_ACCEPTABLE);
        $this->assertEquals('Value less or equal to ZERO', $data["errors"]);
    }

    /**
     *
     * @return void
     */
    public function test_transfer_incorrect_type()
    {
        $payload = [
            "value" => 10,
            "type" => "credito",
            "user_account_debit" => "0000123-4",
            "user_account_credit" => "0000124-4",
            "description" => "Transferência para PinBom",
            "system" => "mobile"
        ];

        $response = $this->post('/api/transfer/1', $payload);
        $data = $response->getOriginalContent();

        $response->assertStatus(Response::HTTP_NOT_ACCEPTABLE);
        $this->assertEquals('Incorrect type use credit or debit.', $data["errors"]);
    }

    /**
     *
     * @return void
     */
    public function test_transfer_debit_account_not_found()
    {
        $payload = [
            "value" => 10,
            "type" => "credit",
            "user_account_debit" => "0000193-4",
            "user_account_credit" => "0000124-4",
            "description" => "Transferência para PinBom",
            "system" => "mobile"
        ];

        $response = $this->post('/api/transfer/1', $payload);
        $data = $response->getOriginalContent();

        $response->assertStatus(Response::HTTP_NOT_ACCEPTABLE);
        $this->assertEquals('Debit account not found.', $data["errors"]);
    }

    /**
     *
     * @return void
     */
    public function test_transfer_credit_account_not_found()
    {
        $payload = [
            "value" => 10,
            "type" => "credit",
            "user_account_debit" => "0000123-4",
            "user_account_credit" => "0000194-4",
            "description" => "Transferência para PinBom",
            "system" => "mobile"
        ];

        $response = $this->post('/api/transfer/1', $payload);
        $data = $response->getOriginalContent();

        $response->assertStatus(Response::HTTP_NOT_ACCEPTABLE);
        $this->assertEquals('Credit account not found.', $data["errors"]);
    }

    /**
     *
     * @return void
     */
    public function test_transfer_success()
    {
        $payload = [
            "value" => 10,
            "type" => "credit",
            "user_account_debit" => "0000123-4",
            "user_account_credit" => "0000124-4",
            "description" => "Transferência para PinBom",
            "system" => "mobile"
        ];

        $response = $this->post('/api/transfer/1', $payload);
        $data = $response->getOriginalContent();

        $response->assertStatus(Response::HTTP_CREATED);
        $this->assertEquals(true, $data);
    }
}
