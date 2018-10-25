@extends('admin.master')
@section('content')

		<?php 
          $books = DB::table('books')->count('*'); 
          $students = DB::table('students')->count('*'); 
          $librarians = DB::table('users')->where('level',2)->count('*');
          $issue = DB::table('issue')->count('*');
          $neworder = DB::table('orders')->where('status',0)->count('*');
          $valid = DB::table('issue')->whereRaw('DATE(returndate)>CURRENT_DATE')->count('*');   
        ?>


      <div class="clearfix"></div>
		
                <!-- top tiles -->
                <div class="row tile_count" style="margin-right:-245px;">
					 <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
									
                            <span class="count_top"><i class="fa fa-users"></i> Librarian</span>
				
                            <div class="count green">{!!$librarians!!}</div>
							 <span class="count_bottom"> Total of Librarians</span>

                        </div>
                    </div>
					<div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
											
                            <span class="count_top"><i class="fa fa-male"></i> <i class="fa fa-female"></i> Student</span>
				
                            <div class="count green">{!!$students!!}</div>
							 <span class="count_bottom">Total of Students</span>							
                        </div>
                    </div>
					<div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
											
                            <span class="count_top"><i class="fa fa-book"></i> Books</span>
				
                            <div class="count green">{!!$books!!}</div>
							 <span class="count_bottom ">Total of Titles in Library</span>                     
					  </div>
                    </div>
					<div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
											
                            <span class="count_top"><i class="fa fa-book"></i> Borrowed Books </span>
				
                            <div class="count green">{!!$issue!!}</div>
							 <span class="count_bottom ">Total of Borrowed Books</span>
                        </div>
                    </div>
					<div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                      <div class="left"></div>
                        <div class="right">
											
                            <span class="count_top"><i class="fa fa-book"></i> New Requests </span>
				
                            <div class="count green">{!!$neworder!!}</div>
							 <span class="count_bottom ">Total of Processing Requests</span>							
                        </div>
                    </div>
                    

                   

                <br>
                <br>
                </div>
                	<img src="../public/admin/image/logoksu.png" style="width: 1080px;height: 600px;">
                <div>

                </div>
@endsection