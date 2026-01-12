<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Post;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PostResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PostResource\RelationManagers;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            // Bagian Utama
            Section::make('Konten Berita')
                ->schema([
                    TextInput::make('title')
                        ->label('Judul Berita')
                        ->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => 
                            $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                    TextInput::make('slug')
                        ->disabled()
                        ->dehydrated()
                        ->required(),

                    RichEditor::make('content')
                        ->label('Isi Berita')
                        ->required()
                        ->columnSpanFull(),
                ])->columnSpan(2),

            // Bagian Samping (Sidebar)
            Section::make('Informasi Tambahan')
                ->schema([
                    Select::make('category')
                        ->label('Kategori')
                        ->options([
                            'ponpes' => 'Pondok Pesantren',
                            'madin' => 'Madrasah Diniyah',
                            'tpq' => 'TPQ',
                        ])
                        ->required(),

                    FileUpload::make('image')
                        ->label('Foto Utama')
                        ->image()
                        ->directory('berita'),

                    Toggle::make('is_published')
                        ->label('Terbitkan')
                        ->default(false),
                ])->columnSpan(1),
        ])->columns(3);
    }

   public static function table(Table $table): Table
{
    return $table
        ->columns([
            // Menampilkan gambar kecil (thumbnail)
            ImageColumn::make('image')
                ->label('Foto')
                ->circular(), // Membuat gambar jadi bulat agar estetik

            // Judul Utama
            TextColumn::make('title')
                ->label('Judul Berita')
                ->searchable()
                ->sortable(),

            // Kategori dengan warna latar (badge)
            TextColumn::make('category')
                ->label('Kategori')
                ->badge()
                ->color('info'),

            // Status Publikasi menggunakan Icon
            IconColumn::make('is_published')
                ->label('Terbit?')
                ->boolean() // Otomatis jadi centang hijau atau silang merah
                ->trueIcon('heroicon-o-check-circle')
                ->falseIcon('heroicon-o-x-circle'),

            // Tanggal Posting
            TextColumn::make('created_at')
                ->label('Tanggal')
                ->dateTime('d M Y')
                ->sortable(),
        ])
        ->filters([
            // Di sini kita bisa tambah filter untuk status publikasi
        ]);
}

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
