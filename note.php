1/ nhớ bỏ  <base href="{{asset(' ')}}"/>  vào header của master.blade ko sẽ mất css
2/ đếm toàn bộ sp khi dùng paginate() dùng $sanpham->total() thay vì count($sanpham) 
3/ to check if it is Collection or Object, var_dump or dd it.
-  if "object(Illuminate\Database\Eloquent\Collection)#231..." =>Colllection.
-  if "object(App\ProductType)#229..." =>Object.
4/ $cart là Object và $cart->items là array có key là idSP và value là info của sp đó(Info sp đó chính là property of Cart class)
Ex: $cart = [
		items => [NK001 =>['qty' => 1, 'price' => '3,800,000', 'item' => product of ID NK001 expressed as obj]],
		totalQty => 1,
		totalPrice => 3,800,000
			]
5/ AppServicePrvider.php:
public function boot(): lưu ý: session('cart') must be put in   View::composer, else error.
Similarly, Session::flush('cart') must be put in   View::composer, else not work
6/ get the last inseted id example: pageController@postCheckout
7/ Insert multiple records: pageController@postCheckout