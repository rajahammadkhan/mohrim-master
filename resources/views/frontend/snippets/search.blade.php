@if($ThemeSettings('option-search-filter-type','stores'))
    <div class="search p-2 d-flex justify-content-between mx-2">
        <div class="fields">
            <select class="px-1" id="selectbox1"
                    onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                <option value="fr" hidden selected>
                    CATEGORIES
                </option>
                @foreach($Categories('store') as $category)
                    <option value="">{{$category->title}} </option>
                @endforeach
            </select>

            <input type="text" class="ps-3" placeholder="Search Stores & Details">
        </div>
        <button type="submit" class="search-btn border-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#3b589d"
                 class="bi bi-search" viewBox="0 0 16 16">
                <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
            </svg>
        </button>
    </div>
@elseif($ThemeSettings('option-search-filter-type','coupons'))
    <form class="m-0 searchbar" action="{{url('search-result')}}" method="get">
        @csrf
    <div class="search p-2 d-flex justify-content-between mx-2">
        <div class="fields">
            <select name="category" class="px-1" >
                <option value="" hidden selected>
                    CATEGORIES
                </option>
                @foreach($Categories('coupon') as $category)
                    <option value="{{base64_encode($category->id)}}">{{$category->title}} </option>
                @endforeach
            </select>

            <input type="text" name="coupon" class="ps-3" placeholder="Search Coupons & Deals"  id="show-user">
        </div>
        <button type="submit" class="search-btn border-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#38c4ca"
                 class="bi bi-search" viewBox="0 0 16 16">
                <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
            </svg>
        </button>
    </div>
        <ul>

        </ul>
    </form>
@endif

