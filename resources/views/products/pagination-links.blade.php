 <section class="pagination">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 d-flex justify-content-center">
                        <ul class="pagination">
                        @if ($paginator->hasPages())

                            <!-- prev -->
                            @if ($paginator->onFirstPage())
                            <li class="item disabled">
                              <a class="item-link item-link--prev"  tabindex="-1" aria-disabled="true">
                                  <img src="images/right.png" alt="Arrow back" class="arrow-back">
                              </a>
                            </li>
                            @else
                           <li class="item disabled">
                              <a class="item-link item-link--prev" href="{{ $paginator->previousPageUrl() }}" tabindex="-1" aria-disabled="true">
                                 <img src="images/right.png" alt="Arrow back" class="arrow-back">
                              </a>
                            </li>
                            @endif
                            <!-- prev end -->

                            <!-- numbers -->
                            @foreach ($elements as $element)

                                @if (is_array($element))
                                @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                 <li class="item activ">
                                    <a class="item-link item-link--active" href="{{ $url }}">{{$page}} <span class="sr-only">{{$page}}</span></a>
                                 </li>
                                @else
                                 <li class="item">
                                    <a class="item-link " href="{{ $url }}">{{$page}} <span class="sr-only">{{$page}}</span></a>
                                 </li>
                                  @endif
                                @endforeach
                                @endif

                            @endforeach
                            <!-- end numbers -->


                            <!-- next  -->
                            @if ($paginator->hasMorePages())
                            <li class="item">
                                    <a class="item-link item-link--next" href="{{ $paginator->nextPageUrl() }}">
                                        <img src="images/left.png" alt="Arrow back" class="arrow-back">
                                </a>
                            </li>
                            @else
                                <li class="item">
                                    <a class="item-link item-link--next" >
                               <img src="images/left.png" alt="Arrow back" class="arrow-back">
                                </a>
                            </li>
                            @endif
                            <!-- next end -->

                        @endif

                        </ul>

                    </div>
                </div>
            </div>
        </section>
