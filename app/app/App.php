<?php

declare(strict_types=1);

function getTransactionFiles(string $dirPath) : array
{
    $files = [];
    foreach (scandir($dirPath) as $file) {
        if (is_dir($file)) {
            continue;
        }

        $files[] = $dirPath . $file;
    }

    return $files;
}

function getTransactions (string $fileName, ?callable $transactionHandler = null) : array
{
    if (! file_exists($fileName)) {
        trigger_error('File "' . $fileName . '" does not exist.' . E_USER_ERROR);
    }

    $file = fopen($fileName, 'r');

    $transactions = [];

    fgetcsv($file);

    while (($transaction = fgetcsv($file)) !== false) {
        if($transactionHandler !== null) {
            $transaction = $transactionHandler($transaction);
        }

        $transactions[] = $transaction;
    }

    return $transactions;
}

function extractTransaction(array $transactionRow): array
{
   [$date, $checkNumber, $description, $amount] = $transactionRow;

   $amount = (float) str_replace(['$', ','], '', $amount);

    return [
        'date'        => $date,
        'checkNumber' => $checkNumber,
        'description' => $description,
        'amount'      => $amount
    ];
}

function calculateTotals(array $trasactions): array
{
    $totals = ['netTotal' => 0, 'totalIncome' => 0, 'totalExpense' => 0];

    foreach ($trasactions as $trasaction) {
        $totals['netTotal'] += $trasaction['amount'];

        if ($trasaction['amount'] >= 0) {
            $totals['totalIncome'] += $trasaction['amount'];
        } else {
            $totals['totalExpense'] += $trasaction['amount'];
        }
    }

    return $totals;
}