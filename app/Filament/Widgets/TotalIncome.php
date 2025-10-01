<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\OrderDetail;
use Carbon\Carbon;

class TotalIncome extends BaseWidget
{
    protected function getCards(): array
    {
        $totalIncome = OrderDetail::sum('total_amount');

        return [
            Card::make('Total Income (USD)', number_format($totalIncome, 2))
                ->description('Based on Total orders')
                ->descriptionIcon('heroicon-o-currency-dollar')
                ->color('success'),
        ];
    }
}
