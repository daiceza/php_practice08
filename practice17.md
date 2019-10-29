## 編集履歴テーブルの作成と関連付け
Migrationファイルの雛形を作成  
```
php artisan make:migration create_pr_histories_table
```
database/migrations/yyyy_mm_dd_hhmmss_create_pr_histories_table.phpを次のように編集
``` php
public function up()
    {
        Schema::create('pr_histories', function(Blueprint $table) {
            $table->bigIncrements('id');
            //課題17追記
            $table->integer('profile_id');
            $table->string('edited_at');

            $table->timestamps();
        });
    }
```
Migrationを実行  
```
php artisan migrate
```  
Modelの雛形を作成
```
php artisan make:model Pr_History
```
app/Pr_History.php で Pr_History Modelを下記のように実装。
```php
class Pr_History extends Model
{
    //課題17 追記
    protected $guarded = array('id');
    protected $table = 'pr_histories';
    public static $rules = array(
        'create_id' => 'required',
        'edited_at' => 'required',
    );
}
```
Profile Modelとの関連を定義するために、app/Profile.phpへ以下の内容を追記
```php
class Profile extends Model
{
    //課題14-5
    protected $guarded = array('id');
    //課題16-1
    public static $rules =array(
        'name' => 'required',
        'gender' => 'required',
        'hobby' => 'required',
        'introduction' => 'required',
    );
    //課題17追記
    //profileモデルに関連付けを行う
    public function pr_histories()
    {
        return $this->hasMany('App\Pr_History');
    }
}
```
## 編集履歴の記録と参照
app/Http/Controllers/Admin/ProfileController.phpのupdate Actionを編集
```php
    public function update(Request $request)
    {
        $this->validate($request, Profile::$rules);
        $profile = Profile::find($request->id);
        $profile_form =$request->all();
        unset($profile_form['_token']);
        
        $profile->fill($profile_form)->save();
        
        //課題17 追記
        $history = new Pr_History;
        $history->profile_id=$profile->id;
        $history->edited_at =Carbon::now();
        $history->save();
        
        return redirect('admin/profile/');
    }
```
ProfileController.phpの冒頭に追記
```php
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profile;
//課題17追記
use App\Pr_History;
use Carbon\carbon;
```
resources/views/admin/profile/edit.blade.php を編集
```php
<form action="{{ action('Admin\ProfileController@update') }}" method="post" enctype="multipart/form-data">
～
 </form>
 <!--課題17追記-->
 <div class="row mt-5">
    <div class="col-md-4 mx-auto">
        <h2>編集履歴</h2>
        <ul class="list-group">
            @if ($profile_form->pr_histories != NULL)
                @foreach ($profile_form->pr_histories as $history)
                    <li class="list-group-item">{{ $history->edited_at }}</li>
                @endforeach
            @endif
        </ul>
    </div>
</div>
```