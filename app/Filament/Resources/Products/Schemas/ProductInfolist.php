<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ProductInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // SECTION 1: PRODUCT INFO
                Section::make('Product Info')
                ->description('')
                ->schema([
                    TextEntry::make('name')
                        ->label('Product Name')
                        ->weight('bold')
                        ->color('primary'),
                    TextEntry::make('id')
                        ->label('Product ID'),
                    TextEntry::make('sku')
                        ->label('Product SKU')
                        ->badge()
                        ->color('success'),
                    TextEntry::make('description')
                        ->label('Product Description')
                        ->columnSpanFull(),
                    ])
                ->columnSpanFull(),

                // SECTION 2: PRICING & STOCK
                Section::make('Pricing & Stock')
                ->schema([ 
                    TextEntry::make('price')
                    ->label('Product Price')
                    ->icon('heroicon-o-currency-dollar'), 
                    TextEntry::make('stock')
                    ->label('Product Stock'), 
                ])
                ->columnSpanFull(), 
            ]);
    }
}
