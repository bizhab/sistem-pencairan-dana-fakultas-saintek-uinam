use Illuminate\Support\Facades\Route;

Route::get('/count', function () {
    return response()->json(['count' => 10]);
});

Route::post('/count/increment', function () {
    return response()->json(['count' => 11]);
});