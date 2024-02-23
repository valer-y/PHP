<?php

namespace Tests\Unit\Services;

use App\Services\EmailService;
use App\Services\InvoiceService;
use App\Services\PaymentGatewayService;
use App\Services\SalesTaxService;
use PHPUnit\Framework\TestCase;

class InvoiceServiceTest extends TestCase
{
    /** @test */
    public function it_processes_invoice() : void
    {
        $salesTaxServiceMock = $this->createMock(SalesTaxService::class);
        $paymentGatewayServiceMock = $this->createMock(PaymentGatewayService::class);
        $emailServiceMock = $this->createMock(EmailService::class);

        $paymentGatewayServiceMock->method('charge')->willReturn(true);

        // given
        $invoiceService = new InvoiceService(
            $salesTaxServiceMock,
            $paymentGatewayServiceMock,
            $emailServiceMock
        );

        $customer = ['name' => 'John'];
        $amount = 250;

        // when
        $result = $invoiceService->process($customer, $amount);
        // then

        $this->assertTrue($result);
    }

    public function it_sends_receipt_email_when_invoice_is_processed()
    {
        $salesTaxServiceMock = $this->createMock(SalesTaxService::class);
        $paymentGatewayServiceMock = $this->createMock(PaymentGatewayService::class);
        $emailServiceMock = $this->createMock(EmailService::class);

        $paymentGatewayServiceMock->method('charge')->willReturn(true);

        $emailServiceMock
            ->expects($this->once())
            ->method('send')
            ->willReturn(['name' => 'John'], 'receipt');

        // given
        $invoiceService = new InvoiceService(
            $salesTaxServiceMock,
            $paymentGatewayServiceMock,
            $emailServiceMock
        );

        $customer = ['name' => 'John'];
        $amount = 250;

        // when
        $result = $invoiceService->process($customer, $amount);
        // then

        $this->assertTrue($result);
    }
}