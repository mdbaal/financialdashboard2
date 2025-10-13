<?php

namespace App\Enums;

enum CurrencyTypes: string
{
    case USD = '$';
    case EUR = '€';
    case GBP = '£';
    case JPY = '¥';
    case CHF = 'Fr';
    case AUD = 'A$';
    case CAD = 'C$';
    case NZD = 'NZ$';
    case CNY = 'CNY ';
    case SEK = 'SEK ';
    case NOK = 'NOK ';
    case MXN = 'MXN ';
    case INR = '₹';
    case RUB = '₽';
    case ZAR = 'R';
    case BRL = 'R$';
    case SGD = 'S$';
    case HKD = 'HK$';
    case KRW = '₩';
    case TRY = '₺';
    case PLN = 'zł';
    case DKK = 'DKK ';
    case THB = '฿';
    case HUF = 'Ft';
    case CZK = 'Kč';
    case ILS = '₪';
    case MYR = 'RM';
    case PHP = '₱';
    case TWD = 'NT$';
    case SAR = 'ر.س';
    case AED = 'د.إ';
    case COP = 'COP ';
    case CLP = 'CLP ';
    case PKR = '₨';
    case QAR = 'ر.ق';
    case KWD = 'د.ك';
    case VND = '₫';
    case EGP = 'EGP';
    case IDR = 'Rp';
    case MAD = 'د.م.';
    case RON = 'lei';
    case BGN = 'лв';
    case HRK = 'kn';
    case ISK = 'kr';
    case LKR = 'Rs';
    case NGN = '₦';
    case UAH = '₴';
    case PEN = 'S/';
    case KES = 'KSh';
    case GEL = '₾';
    case BHD = '.د.ب';
    case OMR = 'ر.ع.';
    case JOD = 'د.ا';
    case TND = 'د.ت';

    public static function getCurrencyOptions($type = null): array
    {
        if ($type == 'key') {
            return array_map(function ($enum) {
                return $enum->name;
            }, self::cases());
        }

        if ($type == 'value') {
            return array_map(function ($enum) {
                return $enum->value;
            }, self::cases());
        }

        return array_map(function ($enum) {
            return ['name' => $enum->name, 'value' => $enum->value];
        }, self::cases());
    }

    public static function getCurrencyValue($currency): string
    {
        return array_find(self::cases(), fn ($enum) => $enum->name === $currency)->value;
    }
}
