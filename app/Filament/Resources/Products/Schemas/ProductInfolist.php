<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\IconEntry;
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
                        ->label('Product Description'),
                    TextEntry::make('created_at')
                        ->label('Product Creation Date')
                        ->date('d M Y')
                        ->color('info'),
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
                
                // SECTION 3: Media & Status
                Section::make('Image and Status')
                    ->description('')
                    ->schema([
                        ImageEntry::make('image')
                            ->label('Product Image')
                            ->disk('public'),
                        
                        TextEntry::make('price')
                            ->label('Product Price')
                            ->weight('bold')
                            ->color('primary')
                            ->icon('heroicon-s-currency-dollar'),
                            
                        TextEntry::make('stock')
                            ->label('Product Stock')
                            ->weight('bold')
                            ->color('primary'),
                        IconEntry::make('is_active')
                            ->label('Is Active?')
                            ->boolean(),
                        IconEntry::make('is_featured')
                            ->label('Is Featured?')
                            ->boolean(),
                ])
                ->columnSpanFull()
                ]);
    }
}
