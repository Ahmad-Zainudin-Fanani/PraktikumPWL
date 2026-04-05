<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DateTimePicker;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Schemas\Components\Group;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // section 1 - post details
                Section::make("Post Details")
                    ->description("Fill in the details of the post")
                    ->icon('heroicon-o-document-text')
                    ->schema([
                        // Grouping fields into 2 columns
                        Group::make([
                            // POIN 1: Title minimal 5 karakter 
                            // POIN 3: Custom message untuk title 
                            TextInput::make("title")
                                ->rules(["required", "min:5", "max:255"])
                                ->validationMessages([
                                    'min' => 'Judul harus minimal 5 karakter bos!', 
                                ]),

                            // POIN 1: Slug unik & minimal 3 karakter 
                            // POIN 3: Custom message untuk slug [cite: 258, 476]
                            TextInput::make("slug")
                                ->required()
                                ->unique()
                                ->rules(['min:3'])
                                ->validationMessages([ 
                                    'unique' => 'Slug sudah dipakai, cari yang lain ya.',
                                    'min' => 'Slug kependekan, minimal 3 huruf.',
                                ]),

                            // POIN 1: Category wajib dipilih 
                            Select::make('category_id')
                                ->relationship("category", "name")
                                ->preload()
                                ->required()
                                ->searchable(),

                            ColorPicker::make("color"),
                        ])->columns(2),

                        MarkdownEditor::make("content"),
                    ])->columnSpan(2),

                // Grouping sidebar
                Group::make([ 
                    // section 2 - image
                    Section::make("Image Upload")
                        ->schema([
                            // POIN 1: Image wajib diupload 
                            FileUpload::make("image")
                                ->required()
                                ->disk("public")
                                ->directory("posts"),
                        ]),

                    // section 3 - meta
                    Section::make("Meta Information")
                        ->schema([
                            TagsInput::make("tags"),
                            Checkbox::make("published"),
                            DateTimePicker::make("published_at"),
                        ]),
                ])->columnSpan(1)
            ])->columns(3);
    }
}