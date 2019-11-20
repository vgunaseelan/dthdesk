
<?php
    error_reporting(0);
    $categories=DB::table('categories')->where([['status',1],['parent_id',0]])->get();
?>

<h1 class="offerce_head">Check out what's new</h1>
@foreach($categories as $category)
    <?php
        $sub_categories=DB::table('categories')->select('id','name')->where([['parent_id',$category->id],['status',1]])->orderBy('id', 'DESC')->get();
    ?>       
    @if(count($sub_categories)>0)
    <div class="brand-list">
        <div class="brand-types Package {{$package->p_id==$menu_active? ' active':''}}">
            
                 <a href="{{action('IndexController@index')}}">
                         <div class="all {{$menu_active==1? ' active':''}} product-cat-title"> All </div>
                </a>
            @foreach($sub_categories as $sub_category)
                <a href="{{route('cats',$sub_category->id)}}">
                    <div class="product-cat-title {{$sub_category->id==$menu_active? ' active':''}}"> {{$sub_category->name}} </div>
                </a>

            @endforeach
        </div>
    </div>
    @endif            
@endforeach