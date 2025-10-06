<?php

namespace App\Enums;

enum CurrencyTypes: String
{
    case USD = '$';
    case EUR = '€';
    case GBP = '£';
    case JPY = '¥';
    case CHF = 'Fr';
    case AUD = 'A$';
    case CAD = 'C$';
    case NZD = 'NZ$';
    case CNY = '¥';
    case SEK = 'kr';
    case NOK = 'kr';
    case MXN = '$';
    case INR = '₹';
    case RUB = '₽';
    case ZAR = 'R';
    case BRL = 'R$';
    case SGD = 'S$';
    case HKD = 'HK$';
    case KRW = '₩';
    case TRY = '₺';
    case PLN = 'zł';
    case DKK = 'kr';
    case THB = '฿';
    case HUF = 'Ft';
    case CZK = 'Kč';
    case ILS = '₪';
    case MYR = 'RM';
    case PHP = '₱';
    case TWD = 'NT$';
    case SAR = 'ر.س';
    case AED = 'د.إ';
    case COP = '$';
    case CLP = '$';
    case PKR = '₨';
    case QAR = 'ر.ق';
    case KWD = 'د.ك';
    case VND = '₫';
    case EGP = '£';
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
}