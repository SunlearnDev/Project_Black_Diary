@extends('welcome')
 @section('content')
        <section class="col-span-4  w-full h-screen grid grid-cols-5 gap-2 p-4">
            <div class="flex mx-2 h-full col-span-4 w-full gap-2 mt-3">
                <div class="w-2/6">
                    <div class="grid grid-row-2 gap-2">
                        <div class="bg-white border w-full border-primary rounded-lg shadow-lg">
                            <div class="p-4 text-center">
                                <div class="relative">
                                    <img class="w-32 h-32 rounded-full  mx-auto outline outline-2 outline-offset-2 outline-green-500 " src="{{ $data->avatar }}" alt="Avatar">
                                    <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 ">
                                      
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class=" w-6 h-6 bg-green-500  text-white font-bold rounded-full">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                          </svg>
                                                                                   
                                    </div>
                                </div>
                                <h3 class="text-xl font-semibold mt-2">{{$data->name}}</h3>
                                <p class="text-gray-500">{{$data->other}}</p>
                            </div>
                            <ul class="divide-y divide-gray-200">
                                <li class="flex items-center justify-between p-4">
                                    <span class="font-semibold">Followers</span>
                                    <span class="text-primary">{{ $data->followers()->count() }}</span> 
                                </li>
                                <li class="flex items-center justify-between p-4">
                                    <span class="font-semibold">Following</span>
                                    <span class="text-primary">{{ $data->following()->count() }}</span>
                                </li>
                            </ul>
                            <div class="p-4">
                                <a href="{{ route('create')}}"
                                    class="block w-full bg-blue-600 py-2 px-4 bg-primary text-white text-center font-semibold rounded-lg hover:bg-opacity-80 transition duration-300">
                                    Đăng Bài
                                </a>
                            </div>
                        </div>
                            {{-- About --}}
                        <div class="bg-white border rounded-lg ">
                            <div class="">
                                <div class="font-semibold text-xl h-12  mb-4 border rounded-t-lg p-2 bg-blue-500 text-white">About
                                    Me</div>
                                <div class="p-4">
                                    <div class="mb-4 ">
                                        <strong><i class="fas fa-book mr-1"></i> Education</strong>
                                        <p class="text-gray-600">
                                            B.S. in Computer Science from the University of Tennessee at Knoxville
                                        </p>
                                    </div>

                                    <hr class="my-4">

                                    <div class="mb-4">
                                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                                        <p class="text-gray-600">Malibu, California</p>
                                    </div>

                                    <hr class="my-4">

                                    <div class="mb-4">
                                        <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>
                                        <p class="text-gray-600 ">
                                            <div>
                                                <span class="mt-2 bg-red-500 text-white rounded-full px-2 py-1 mr-1">UI
                                                    Design</span>
                                                <span
                                                    class=" bg-green-500 text-white rounded-full px-2 py-1 mr-1">Coding</span>
                                                <span
                                                    class=" bg-blue-500 text-white rounded-full px-2 py-1 mr-1">Javascript</span>
                                                <span
                                                    class=" bg-yellow-500 text-white rounded-full px-2 py-1 mr-1">PHP</span>
                                                <span class=" bg-indigo-500 text-white rounded-full px-2 py-1 mr-1">Node.js</span>
                                            </div>
                                        </p>
                                    </div>

                                    <hr class="my-4">

                                    <div>
                                        <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>
                                        <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing
                                            elit. Etiam fermentum enim neque.</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                            {{-- End About --}}
                    </div>
                </div>
                <div class="col-span-3 w-auto ">
                    <div class="card-body">
                        <div class="tab-content">
                            <!-- Tab pane 1: Activity -->
                            <div class="tab-pane active" id="activity">
                                <!-- Post 1 -->
                                {{-- @foreach ( $diary as $value )
                                <div class="bg-white shadow-md rounded-lg p-4 mb-4">
                                    <!-- User block -->
                                    <div class="flex items-center mb-3">
                                        <img class="w-10 h-10 rounded-full mr-2" src="../../dist/img/user1-128x128.jpg"
                                            alt="user image">
                                        <div>
                                            <a href="#" class="text-blue-500 font-semibold">{{ }}</a>
                                            <span class="text-gray-500 text-sm">Shared publicly - 7:30 PM today</span>
                                        </div>
                                    </div>
                                    <!-- Post content -->
                                    <p class="text-gray-700">
                                       Lorem ipsum represents a long-held tradition for designers,
                                        typographers and the like. Some people hate it and argue for
                                        its demise, but others ignore the hate as they create awesome
                                        tools to help create filler text for everyone from bacon lovers
                                        to Charlie Sheen fans.
                                    </p>
                                    <!-- Actions -->
                                    <div class="mt-2">
                                        <a href="#" class="text-gray-500 text-sm mr-4"><i
                                                class="fas fa-share mr-1"></i> Share</a>
                                        <a href="#" class="text-gray-500 text-sm"><i
                                                class="far fa-thumbs-up mr-1"></i> Like</a>
                                        <span class="float-right">
                                            <a href="#" class="text-gray-500 text-sm">
                                                <i class="far fa-comments mr-1"></i> Comments (5)
                                            </a>
                                        </span>
                                    </div>
                                    <!-- Comment input -->
                                    <input class="form-input w-full mt-3" type="text" placeholder="Type a comment">
                                </div>
                                @endforeach --}}
                            </div>
                            <!-- End of Tab pane 1: Activity -->

                            <!-- Tab pane 2: Timeline -->
                            {{-- <div class="tab-pane" id="timeline">
                                <!-- Timeline -->
                                <div class="bg-white shadow-md rounded-lg p-4">
                                    <!-- Timeline item 1 -->
                                    <div class="border-l-4 border-red-500 pl-3 mb-4">
                                        <i class="fas fa-envelope text-primary"></i>
                                        <span class="text-gray-600 ml-2">10 Feb. 2014</span>
                                        <h3 class="text-blue-500 text-sm font-semibold mt-1">
                                            <a href="#">Support Team</a> sent you an email
                                        </h3>
                                        <div class="text-gray-700 mt-1">
                                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                            quora plaxo ideeli hulu weebly balihoo...
                                        </div>
                                        <div class="mt-2">
                                            <a href="#" class="text-blue-500 text-sm mr-2">Read more</a>
                                            <a href="#" class="text-red-500 text-sm">Delete</a>
                                        </div>
                                    </div>
                                    <!-- End of Timeline item 1 -->

                                    <!-- Timeline item 2 -->
                                    <div class="border-l-4 border-info-500 pl-3 mb-4">
                                        <i class="fas fa-user text-info"></i>
                                        <span class="text-gray-600 ml-2">5 mins ago</span>
                                        <h3 class="text-blue-500 text-sm font-semibold mt-1">
                                            <a href="#">Sarah Young</a> accepted your friend request
                                        </h3>
                                    </div>
                                    <!-- End of Timeline item 2 -->

                                    <!-- Timeline item 3 -->
                                    <div class="border-l-4 border-warning-500 pl-3 mb-4">
                                        <i class="fas fa-comments text-warning"></i>
                                        <span class="text-gray-600 ml-2">27 mins ago</span>
                                        <h3 class="text-blue-500 text-sm font-semibold mt-1">
                                            <a href="#">Jay White</a> commented on your post
                                        </h3>
                                        <div class="text-gray-700 mt-1">
                                            Take me to your leader!
                                            Switzerland is small and neutral!
                                            We are more like Germany, ambitious and misunderstood!
                                        </div>
                                        <div class="mt-2">
                                            <a href="#" class="text-yellow-500 text-sm">View comment</a>
                                        </div>
                                    </div>
                                    <!-- End of Timeline item 3 -->

                                    <!-- Timeline item 4 -->
                                    <div class="border-l-4 border-purple-500 pl-3 mb-4">
                                        <i class="fas fa-camera text-purple"></i>
                                        <span class="text-gray-600 ml-2">2 days ago</span>
                                        <h3 class="text-blue-500 text-sm font-semibold mt-1">
                                            <a href="#">Mina Lee</a> uploaded new photos
                                        </h3>
                                        <div class="mt-2">
                                            <img src="https://placehold.it/150x100" alt="...">
                                            <img src="https://placehold.it/150x100" alt="...">
                                            <img src="https://placehold.it/150x100" alt="...">
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
       
 @endsection
