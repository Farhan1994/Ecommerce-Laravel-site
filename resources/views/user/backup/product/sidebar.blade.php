<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<h4 class="m-text14 p-b-7">
							Categories
						</h4>

						<ul class="p-b-54">
							@foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)
							<li class="p-t-4">
								<a href="#main-{{ $parent->id }}" class="list-group-item list-group-item-action" data-toggle="collapse">
									{{ $parent->name }}
								</a>

								<div class="collapse
      								@if (Route::is('categories.show'))
        								@if (App\Models\Category::ParentOrNotCategory($parent->id, $category->id))
          									show
        								@endif
     								 @endif
    							" id="main-{{ $parent->id }}">
     							 <div class="child-rows">
       								 @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', $parent->id)->get() as $child)
          								<a href="{!! route('categories.show', $child->id) !!}" class="list-group-item list-group-item-action
            								@if (Route::is('categories.show'))
             								 @if ($child->id == $category->id)
              									  active
             								 @endif
            								@endif
           						 ">
           						 			
          								  {{ $child->name }}
         								</a>
        							@endforeach
      							</div>


    							</div>
							</li>
							@endforeach
							

							
						</ul>

						<!--  -->
						<h4 class="m-text14 p-b-32">
							Filters
						</h4>

						<div class="filter-price p-t-22 p-b-50 bo3">
							<div class="m-text15 p-b-17">
								Price
							</div>

							<div class="wra-filter-bar">
								<div id="filter-bar"></div>
							</div>

							<div class="flex-sb-m flex-w p-t-16">
								<div class="w-size11">
									<!-- Button -->
									<button class="flex-c-m size4 bg7 bo-rad-15 hov1 s-text14 trans-0-4">
										Filter
									</button>
								</div>

								<div class="s-text3 p-t-10 p-b-10">
									Range: $<span id="value-lower">610</span> - $<span id="value-upper">980</span>
								</div>
							</div>
						</div>


						
					</div>
				</div>