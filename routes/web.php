<?php

use App\Models\Page;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CelebrationController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SliderController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



/*****-------------------User Menu--------------******/

Route::get('/', function () {
    return view('index');
    // return;
});

/**
 * Administration Menu Link
 */
Route::get('/president', [MessageController::class, 'president'])->name("president");
Route::get('/principal', [MessageController::class, 'principal'])->name('principal');
Route::get('/vice-principal', [MessageController::class, 'vice']);
Route::get('/governing-body', [OfficerController::class, 'governingBody']);
Route::get('/faculty-member', [OfficerController::class, 'facultyMember']);
Route::get("/office-stuff", [OfficerController::class, 'officeStuff']);

/**
 * @param int $category id
 * @param string $name category
 */
Route::get('/page/{category}/{name}', [PageController::class, 'index'])->name('page');

/**----Notice-----***/
Route::get('/notice', [NoticeController::class, 'show'])->name('notice');
Route::get('/notice/{id}', [NoticeController::class, 'details'])->name('details');

Route::get('/pdf-notice/{file}', function ($file) {
    return response()->file(public_path('storage/file' . '/' . $file), [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; filename="' . $file . '"'
    ]);
})->name('pdf');

/**------------News-----------*/
Route::get('/news', [NewsController::class, 'newses'])->name('news');
Route::get("/news/{id}", [NewsController::class, 'news_show'])->name('news.show')->where('id', '[0-9]+');


/**
 **------------------------ Admin Menu ---------------------------------
 */
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin');

    // Route::get('/login', [A])

    //slider menu
    Route::get('/sliders', [SliderController::class, 'index']);
    Route::get('/sliders/create', [SliderController::class, 'create'])->name('slider.create');
    Route::post('/sliders', [SliderController::class, 'store'])->name('slider.store');
    Route::get('/sliders/{id}/delete', [SliderController::class, 'trash'])->name('slider.trash');
    Route::get('/sliders/{id}', [SliderController::class, 'show'])->name('slider.show');
    Route::get('/sliders/{id}/edit', [SliderController::class, 'edit'])->name('slider.edit');
    Route::put('/sliders/{id}', [SliderController::class, 'update'])->name('slider.update');

    /**
     * Administration Sub-Menu
     */
    Route::get('/messages', [MessageController::class, 'show'])->name('admin.message');
    Route::get('/messages/{id}/edit', [MessageController::class, 'edit'])->name('admin.edit');
    Route::post('/messages/{id}', [MessageController::class, 'store'])->name('admin.message.store');
    /**
     * under below these route for create institute
     * adminstrative section member(governing-body, office-stuff, faculty)
     */
    Route::get('/create-officer', [OfficerController::class, 'index'])->name('admin.officer');
    Route::post('/create-officer', [OfficerController::class, 'store'])->name('admin.officer.create');
    Route::get('/edit-officer/{id}/edit', [OfficerController::class, 'edit'])->name('admin.officer.edit');
    Route::put('/update-officer/{id}', [OfficerController::class, 'update'])->name('admin.officer.update');
    Route::delete('delete-officer/{id}', [OfficerController::class, 'delete'])->name('admin.officer.delete');

    /*****------Governing Body--------****/
    Route::get('/governing-body', [OfficerController::class, 'governingBodyAdmin'])->name('admin.governing-body');
    /****------Faculty Member---------***/
    Route::get('/faculty-member', [OfficerController::class, 'facultyMemberAdmin'])->name('admin.faculty-member');
    /****------Office Stuuf-----------***/
    Route::get('/office-stuff', [OfficerController::class, 'officeStuffAdmin'])->name('admin.office-stuff');

    /**---Page Controller or Page functionality ***/
    Route::post('/page', [PageController::class, 'store'])->name('admin.page.store');
    Route::put('/page/{id}', [PageController::class, 'update'])->name('admin.page.update');
    Route::delete('/page/{id}', [PageController::class, 'delete'])->name('admin.page.delete');
    /****----------Cateogry------***/
    Route::get('/category', [CategoryController::class, 'index'])->name('admin.category');
    Route::post('/category', [CategoryController::class, 'store'])->name("admin.cateogry.store");
    Route::put('/category/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::delete('/category/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
    /***-------Content----------***/
    Route::get('/content', [ContentController::class, 'index'])->name('admin.content');
    Route::get('/content/create', [ContentController::class, 'create'])->name('admin.content.create');
    Route::post('/content', [ContentController::class, 'store'])->name('admin.content.store');
    Route::get('/content/{id}', [ContentController::class, 'view'])->name('admin.content.view');
    Route::get('/content/{id}/edit', [ContentController::class, 'edit'])->name('admin.content.edit');
    Route::put('/content/{id}', [ContentController::class, 'update'])->name('admin.content.update');
    Route::delete('/content/{id}', [ContentController::class, 'destroy'])->name('admin.content.destroy');
    Route::get('/pdf/{file}', function ($file) {
        return response()->file(public_path('storage/file' . '/' . $file), [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $file . '"'
        ]);
    })->name('admin.pdf');

    /***----------------Notice-----------***/
    Route::get('/notice', [NoticeController::class, 'index'])->name('admin.notice');
    Route::post('/notice', [NoticeController::class, 'store'])->name('admin.notice.store');
    Route::get('/notice/{id}', [NoticeController::class, 'edit'])->name('admin.notice.edit');
    Route::put('/notice/{id}', [NoticeController::class, 'update'])->name('admin.notice.update');
    Route::delete('/notice/{id}', [NoticeController::class, 'destroy'])->name('admin.notice.destroy');

    /**------------------------News---------------- */
    Route::get('/news', [NewsController::class, 'index'])->name('admin.news');
    Route::get('/news/create', [NewsController::class, 'create'])->name('admin.news.create');
    Route::post('/news/create', [NewsController::class, 'store'])->name('admin.news.store');
    Route::get('/news/{id}', [NewsController::class, 'show'])->name('admin.news.show')->where('id', '[0-9]+');
    Route::get('/news/{id}/edit', [NewsController::class, 'edit'])->name('admin.news.edit')->where('id', '[0-9]+');
    Route::put('/news/{id}', [NewsController::class, 'update'])->name('admin.news.update')->where('id', '[0-9]+');
    Route::delete('/news/{id}', [NewsController::class, 'delete'])->name('admin.news.delete')->where('id', '[0-9]+');

    /**** ---------------100 Years clebrations --------------**/
    Route::get('/100-celebrations', [CelebrationController::class, 'list'])->name('admin.100');
    Route::get('/100-celebrations-assets', [CelebrationController::class, 'asset'])->name('admin.100.assets');
    Route::post('/100-celebrations-assets', [CelebrationController::class, 'assets_store'])->name('admin.100.assets');
    Route::get('/100-celebrations-expense', [CelebrationController::class, 'expense'])->name('admin.100.expense');
    Route::post('/100-celebrations-expense', [CelebrationController::class, 'expense_store'])->name('admin.100.expense');
    Route::post('/100-celebrations-fee/{id}', [CelebrationController::class, 'registration_fee'])->name('admin.100.fee')->where('id', '[0-9]+');
    Route::get('/100-celebrations-view/{id}', [CelebrationController::class, 'show'])->name('admin.100.view')->where('id', '[0-9]+');
    Route::delete('/100-celebrations-delete/{id}', [CelebrationController::class, 'delete'])->name('admin.100.delete')->where('id', '[0-9]+');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**** ---------------100 Years clebrations --------------**/
Route::get('/100-years-celebrations', [CelebrationController::class, 'index'])->name('100');
Route::post('/100-years-celebrations', [CelebrationController::class, 'store'])->name('100');
