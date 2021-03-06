@extends('layouts.site')

@section('content')

<!--- main content start ------->

<!-- Breadcrumb -->
			<div class="breadcrumb">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<a class="breadcrumb-part breadcrumb-link-1" href="/">
									<i class="fa fa-home"></i>
								</a>
								<span class="last-breadcrumb-part font-3">პროცესორები</span>
							</div>
						</div>
					</div>
			</div>
	 <!-- /Breadcrumb -->

 @if($contentData['processorsExist'])

			<div class="columns-container">
					<div id="columns" class="container ">
							<div class="row">
									<div id="left_column" class="column col-xs-12 col-sm-3 filter">

												 <div id="layered_block_left" class="block">
														 <div class="block_content filter-item-1">
																 <form action="{{ route('cpuLoad') }}" class="filter-form" method="post" id="layered_form">
																		<div class="filter-form-container">

																			<!--- Order and visibility params ------->

																			<input name="order" type="hidden" class="order" value="0">
																			<input name="numOfProductsToShow" type="hidden" class="numOfProductsToShow" value="15">
																			<input name="active-page" type="hidden" class="active-page" value="1">

																			<!--- Price filter start --->

																			<div class="layered_price">
																					<div class="layered_subtitle_heading">
																						<h2 class="title_block">
																						 <span></span>
																						 <span class="font-3">ღირებულება</span>
																					 </h2>
																					</div>
																					<ul id="ul_layered_price_0" class="col-lg-12 layered_filter_ul">
																							<div id="price-range" data-min-price="{{ $contentData['configuration']['productPriceRange'] -> processorMinPrice }}" data-max-price="{{ $contentData['configuration']['productPriceRange'] -> processorMaxPrice }}">
																							 <span class="from-sign">₾</span>
																							 <input name="price-from" type="text" class="price-from" oninput="this.value = this.value.replace(/[^0-9.]/g, '')" value="{{ $contentData['configuration']['productPriceRange'] -> processorMinPrice }}">
																							 <span class="to-sign">₾</span>
																							 <input name="price-to" type="text" class="price-to" oninput="this.value = this.value.replace(/[^0-9.]/g, '')" value="{{ $contentData['configuration']['productPriceRange'] -> processorMaxPrice }}">
																							</div>
																							<input type="hidden" class="slider-input" value="{{ $contentData['configuration']['productPriceRange'] -> processorMinPrice }}, {{ $contentData['configuration']['productPriceRange'] -> processorMaxPrice }}"/>
																					</ul>
																			</div>
																		<!--- Price filter end ------>

																		<!--- Clock speed filter start ---->

																		<div class="layered_filter">
																			<div class="layered_subtitle_heading">
																				<h2 class="title_block">
																				 <span></span>
																				 <span class="font-3">სიხშირე</span>
																			 </h2>
																			</div>
																			<ul id="ul_layered_price_0" class="col-lg-12 layered_filter_ul">
																				<div id="price-range" data-speed-from="{{ $contentData['configuration']['minClockSpeed'] }}" data-speed-to="{{ $contentData['configuration']['maxClockSpeed'] }}">
																					<span class="from-sign">Ghz</span>
																					<input name="speed-from" type="text" class="speed-from" oninput="this.value = this.value.replace(/[^0-9.]/g, '')" value="{{ $contentData['configuration']['minClockSpeed'] }}" style="text-indent: 36px">
																					<span class="to-sign">Ghz</span>
																					<input name="speed-to" type="text" class="speed-to" oninput="this.value = this.value.replace(/[^0-9.]/g, '')" value="{{ $contentData['configuration']['maxClockSpeed'] }}" style="text-indent: 36px">
																				</div>
																			</ul>
																		</div>

																		<!--- Clock speed filter end ------->

																			<!--- Manufacturer filter start --------->

																			<div class="layered_filter">
																					<h2 class="title_block">
																						<span class="font-3">მწარმოებელი</span>
																					</h2>
																					<ul class="col-lg-12 layered_filter_ul">

																						@foreach($contentData['configuration']['cpuManufacturers'] as $key => $value)
																							<li class="nomargin hiddable col-lg-12">
																									<input type="checkbox" class="checkbox" value="{{ $value -> id }}" data-active="0" data-hidden-input="cpu-manufacturer"/>
																									<label for="">
																											<a href="#" data-rel="nofollow">
																												<b>{{ $value -> manufacturerTitle }}</b>
																												<span> ({{ $value -> numOfProducts }})</span>
																											</a>
																									</label>
																							 </li>
																						 @endforeach
																					 </ul>
																				 <input name="cpu-manufacturer" type="hidden" class="cpu-manufacturer" value="0">
																				</div>

																			 <!--- Manufacturer filter end ----->


																			 <!--- CPU series filter start ------->

																				<div class="layered_filter">
																						<h2 class="title_block">
																						 <span class="font-3">პროცესორი</span>
																					 </h2>
																					<ul class="col-lg-12 layered_filter_ul">
																						@foreach($contentData['configuration']['cpuSeries'] as $key => $value)
																							<li class="nomargin hiddable col-lg-12">
																									<input type="checkbox" class="checkbox" value="{{ $value -> id }}" data-active="0" data-hidden-input="cpu-series"/>
																									<label for="">
																											<a href="#" data-rel="nofollow">
																												<b>{{ $value -> seriesTitle }}</b>
																												<span> ({{ $value -> numOfProducts }})</span>
																											</a>
																									</label>
																							</li>
																						@endforeach
																					</ul>
																				 <input name="cpu-series" type="hidden" class="cpu-series" value="0">
																			</div>

																			<!--- CPU series filter end ----->


																			<!--- Socket filter start ------->

																				<div class="layered_filter">
																						<h2 class="title_block">
																						 <span class="font-3">ბუდე</span>
																					 </h2>
																					<ul class="col-lg-12 layered_filter_ul">
																					 @foreach($contentData['configuration']['cpuSockets'] as $key => $value)
																							<li class="nomargin hiddable col-lg-12">
																									<input type="checkbox" class="checkbox" value="{{ $value -> id }}" data-active="0" data-hidden-input="cpu-socket"/>
																									<label for="">
																											<a href="#" data-rel="nofollow">
																												<b>{{ $value -> socketTitle }}</b>
																												<span> ({{ $value -> numOfProducts }})</span>
																											</a>
																									</label>
																							</li>
																					 @endforeach
																					</ul>
																			 <input name="cpu-socket" type="hidden" class="cpu-socket" value="0">
																			</div>

																			<!--- Socket filter end ----->


																			<!--- Cores filter start ------>

																			<div class="layered_filter">
																					<h2 class="title_block">
																					 <span class="font-3">ბირთვები</span>
																				 </h2>
																				<ul class="col-lg-12 layered_filter_ul">
																				 @foreach($contentData['configuration']['cpuCores'] as $key => $value)
																						<li class="nomargin hiddable col-lg-12">
																								<input type="checkbox" class="checkbox" value="{{ $value -> cores }}" data-active="0" data-hidden-input="cores"/>
																								<label for="">
																										<a href="#" data-rel="nofollow">
																											<b>{{ $value -> cores }}</b>
																											<span> ({{ $value -> numOfProducts }})</span>
																										</a>
																								</label>
																						</li>
																				 @endforeach
																				</ul>
																		 <input name="cores" type="hidden" class="cores" value="0">
																		</div>

																			<!--- Cores filter end ---->


																			<!--- Technology process filter start ------>

																				<div class="layered_filter">
																					<h2 class="title_block">
																					 <span class="font-3">ტექ. პროცესი</span>
																				 </h2>
																				<ul class="col-lg-12 layered_filter_ul">
																				 @foreach($contentData['configuration']['cpuTechnologyProcesses'] as $key => $value)
																						<li class="nomargin hiddable col-lg-12">
																								<input type="checkbox" class="checkbox" value="{{ $value -> id }}" data-active="0" data-hidden-input="technology-process"/>
																								<label for="">
																										<a href="#" data-rel="nofollow">
																											<b>{{ $value -> size }}</b>
																											<span> ({{ $value -> numOfProducts }})</span>
																										</a>
																								</label>
																						</li>
																				 @endforeach
																				</ul>
																		 <input name="technology-process" type="hidden" class="technology-process" value="0">
																		</div>

																			<!--- Stock filter end ------>

																			<div class="layered_filter">
																				<h2 class="title_block">
																				 <span class="font-3">საწყობის ტიპი</span>
																			 </h2>
																			<ul class="col-lg-12 layered_filter_ul">
																			 @foreach($contentData['configuration']['stockTypes'] as $key => $value)
																					<li class="nomargin hiddable col-lg-12">
																							<input type="checkbox" class="checkbox" value="{{ $value -> id }}" data-active="0" data-hidden-input="stock-type"/>
																							<label for="">
																									<a href="#" data-rel="nofollow">
																										<b class="font-4">{{ $value -> stockTitle }}</b>
																										<span> ({{ $value -> numOfProducts }})</span>
																									</a>
																							</label>
																					</li>
																			 @endforeach
																			</ul>
																	 <input name="stock-type" type="hidden" class="stock-type" value="0">
																	</div>


																		<!--- Condition filter start ---->

																		 <div class="layered_filter">
																				<h2 class="title_block">
																				 <span class="font-3">მდგომარეობა</span>
																			 </h2>
																			<ul class="col-lg-12 layered_filter_ul">
																			 @foreach($contentData['configuration']['conditions'] as $key => $value)
																					<li class="nomargin hiddable col-lg-12">
																							<input type="checkbox" class="checkbox" value="{{ $value -> id }}" data-active="0" data-hidden-input="condition"/>
																							<label for="">
																									<a href="#" data-rel="nofollow">
																										<b class="font-4">{{ $value -> conditionTitle }}</b>
																										<span> ({{ $value -> numOfProducts }})</span>
																									</a>
																							</label>
																					</li>
																			 @endforeach
																			</ul>
																	 <input name="condition" type="hidden" class="condition" value="0">
																	</div>

																	<!--- Condition filter end ---->

																	</div>
															</form>
													</div>

										</div>
									</div>

									<!--- Processors list start ----->

									<div id="center_column" class="center_column dor-two-cols col-xs-12 col-sm-9">
											<div class="content_sortPagiBar clearfix">
											 <!-- Sort bar start -->
													<div class="sortPagiBar clearfix">
															<form action="" method="get" class="nbrItemPage">
																	<div class="clearfix selector1">
																			<label for="nb_item" class="hidden">
																					ჩვენება
																			</label>
																			<input type="hidden" name="cate_type" value="2" />
																			<input type="hidden" name="id_category" value="3" />
																			<select name="n" id="nb_item" class="selectpicker">
																					<option value="9">9</option>
																					<option value="12">12</option>
																					<option value="15" selected>15</option>
																					<option value="18">18</option>
																					<option value="21">21</option>
																					<option value="24">24</option>
																					<option value="27">27</option>
																					<option value="30">30</option>
																			</select>
																			<span>per page</span>
																	</div>
															</form>

															<ul class="display hidden-xs">
																	<li class="display-title font-3">ჩვენება:</li>
																	<li id="grid">
																		<a rel="nofollow" href="#" data-toggle="tooltip" data-placement="top">
																			<i class="fa fa-th"></i>
																		</a>
																	</li>
																	<li id="list">
																		<a rel="nofollow" href="#" data-toggle="tooltip" data-placement="top">
																			<i class="fa fa-list"></i>
																		</a>
																	</li>
																	<input type="hidden" class="products-view-type" value="grid">
															</ul>

															<form id="productsSortForm" action="#" class="productsSortForm">
																	<div class="select selector1">
																			<label for="selectProductSort" class="hidden">დახარისხება</label>
																			<select id="selectProductSort" class="selectProductSort selectpicker">
																					<option value="0" selected="selected">დახარისხება ჩუმათობით</option>
																					<option value="1">ფასის კლებადობით</option>
																					<option value="2">ფასის ზრდადობით</option>
																					<option value="3">სიხშირის კლებადობით</option>
																					<option value="4">სიხშირის ზრდადობით</option>
																					<option value="5">ბირთვების კლებადობით</option>
																					<option value="6">ბირთვების ზრდადობით</option>
																					<option value="7">დამატების დროის კლებადობით</option>
																					<option value="8">დამატების დროის ზრდადობით</option>
																			</select>
																	</div>
															</form>
													</div>
											 <!-- Sort bar end -->
										 </div>

											<!-- Products list -->

										 <div id="result-content">

											@foreach($contentData['processors'] as $index => $row)

											 <ul class="product_list grid row showcolumn3" >
												 @foreach($row as $key => $value)
													 <li class="ajax_block_product col-xs-12 col-sm-6 col-md-4 last-in-line first-item-of-tablet-line last-item-of-mobile-line">
															 <div class="product-container">
																	 <div class="dor-display-product-info">
																			 <div class="left-block">
																					 <div class="product-image-container">
																							 <a class="product_img_link" target="_blank" href="/processors/{{ $value -> id }}" title="{{ $value -> title }}">
																								<img class="replace-2x img-responsive" src="/images/processors/main/original/{{ $value -> mainImage }}" width="450" height="478"/>
																							 </a>
																							 <div class="content_price">

																							 <span itemprop="price" class="price product-price">
																									 <b class="currency-gel">₾</b> {{ $value -> newPrice }}
																								</span>

																								<meta itemprop="priceCurrency" content="GEL" />

																								@if($value -> newPrice != $value -> price)
																								<span class="old-price product-price">
																									<b>₾</b> {{ $value -> price }}
																								</span>
																							 @endif

																							 </div>
																					 </div>
																					</div>

																					<div class="right-block">
																							<h5>
																							 <a class="product-name font-4" target="_blank" href="/processors/{{ $value -> id }}" title="{{ $value -> title }}">

																								 <span class="font-4">{{ $value -> title }} </span>
																							 </a>
																							</h5>

																							<div class="product-desc" itemprop="description">
																								 <div>
																									 <b class="font-4">სიხშირე: </b>
																									 <span>{{ $value -> clockSpeed }} Ghz</span>
																								 </div>
																								 <div>
																									 <b class="font-4">ტექნოლოგიური პროცესი: </b>
																									 <span>{{ $value -> size }}</span>
																								 </div>
																								 <div>
																									 <b class="font-4">ბირთვები: </b>
																									 <span>{{ $value -> cores }}</span>
																								 </div>
																								 <div>
																									 <b class="font-4">ბუდე: </b>
																									 <span>{{ $value -> socketTitle }}</span>
																								 </div>
																							 </div>

																							 <div class="content_price">
																									<span class="price product-price">
																									 <b class="currency-gel">₾</b> {{ $value -> newPrice }}
																									</span>

																									@if($value -> newPrice != $value -> price)

																									<span class="old-price product-price">
																										<b>₾</b> {{ $value -> price }}
																									</span>
																								 @endif
																								 </div>

																									<div class="product-flags">
																										<span class="discount"></span>
																									</div>

																								 </div>
																								</div>
																										<div class="product-more-options">
																												<div class="read-more-container">
																														<a class="button read-more-button btn btn-default" target="_blank"  href="/processors/{{ $value -> id }}">
																															<i class="fa fa-plus"></i>
																															<span class="font-3">დაწვრილებით</span>
																														</a>
																												</div>
																												<div class="short-description">
																													<div>
				 																									 <b class="font-4">სიხშირე: </b>
				 																									 <span>{{ $value -> clockSpeed }} Ghz</span>
				 																								 </div>
				 																								 <div>
				 																									 <b class="font-4" title="ტექნოლოგიური პროცესი">ტექ. პროცესი: </b>
				 																									 <span>{{ $value -> size }} </span>
				 																								 </div>
				 																								 <div>
				 																									 <b class="font-4">ბირთვები: </b>
				 																									 <span>{{ $value -> cores }}</span>
				 																								 </div>
				 																								 <div>
				 																									 <b class="font-4">ბუდე: </b>
				 																									 <span>{{ $value -> socketTitle }}</span>
				 																								 </div>
																												</div>
																										</div>

															 </div>
															 <!-- .product-container> -->
													 </li>
													@endforeach
												</ul>
											@endforeach

											<div class="content_sortPagiBar">
													<div class="bottom-pagination-content clearfix">

															<!-- Pagination -->
															<div id="pagination_bottom" class="pagination clearfix" style="width: 80%">
                                <ul class="pagination">

                                    @foreach($contentData['pages'] as $page)

                                    @if($page['isPad'])

                                     <li class="dots">
                                       <span>
                                         <span>{{ $page['value'] }}</span>
                                       </span>
                                     </li>

                                    @elseif($page['isActive'])

                                     <li class="active current">
                                       <span>
                                         <span>{{ $page['value'] }}</span>
                                       </span>
                                     </li>

                                    @else

                                    <li>
                                      <a href="{{ $page['value'] }}">
                                        <span>{{ $page['value'] }}</span>
                                      </a>
                                    </li>

                                    @endif

                                    @endforeach

                                    @if($contentData['maxPage'] > 1)

                                    <li id="pagination_next_bottom" class="pagination_next">
                                        <a href="2" rel="next">
                                         <i class="icon-chevron-right"></i>
                                        </a>
                                    </li>

                                    @endif

                                </ul>
															</div>
															<!-- /Pagination -->

													</div>
											 </div>
										 </div>

									</div>
								 <!--- Processors list end ------>
							</div>
							<!-- .row -->
					</div>
					<!-- #columns -->
			</div>

@include('parts.site.list')

@else

<div class="container" id="no-products-container">
	<div class="columns-container">
		<div class="row">
			 <div class="column col-xs-12 col-sm-12">
				<div class="warning-container">
					<h1 class="font-4">პროდუქცია ჯერ არ არის დამატებული!</h1>
				</div>
			</div>
		</div>
	</div>
</div>

@endif

@endsection
