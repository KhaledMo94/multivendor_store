<?php

namespace App\Helpers;

use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\IntlMoneyFormatter;
use Money\Money;
use NumberFormatter;

class CurrenciesHelpers
{
    public static function show($amount, $currency = null)
    {
        $amount*=100;
        if ($currency) {
            $money = new Money($amount, new Currency($currency));
        } else {
            $money = new Money($amount, new Currency('EGP'));
        }
        $currencies = new ISOCurrencies();
        $numberFormatter = new NumberFormatter(config('app.locale', 'en_US'), NumberFormatter::CURRENCY);
        $moneyFormatter = new IntlMoneyFormatter($numberFormatter, $currencies);

        return $moneyFormatter->format($money);
    }


    public static function convertCurrency()
    {

    }
}
