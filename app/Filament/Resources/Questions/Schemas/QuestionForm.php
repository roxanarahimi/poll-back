<?php

namespace App\Filament\Resources\Questions\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class QuestionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
//                FileUpload::make('images')
//                    ->label('تصاویر')
//                    ->image()
//                    ->multiple()
//                    ->disk('public')
//                    ->directory('img/category')
//                    ->visibility('public')
//                    ->reorderable()
//                    ->maxFiles(10)
//                    ->imageEditor()
//                    ->imageEditorEmptyFillColor('#000000')
//                    ->circleCropper()
//                    ->imageCropAspectRatio('16:5'),
                TextInput::make('question')
                    ->label('سوال')
                    ->required(),

            ]);
    }
}
