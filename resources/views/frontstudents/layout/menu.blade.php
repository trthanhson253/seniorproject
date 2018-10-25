<div class="LandingPageNav is-desktop">
                
                        <div class="SidebarSection" style="width: 250px;">
                            <div class="SidebarSection-header">
                                <h4>Settings</h4>
                                
                            </div>
                            <div class="SidebarSection-content">
                                        <div class="SidebarSection-option"><a href="students/myaccount">My Account</a></div>
                                        <div class="SidebarSection-option"><a href="students/edit/{{Auth::guard('students')->user()->id}}">Edit Personal Information</a></div>
                                    
                                       <div class="SidebarSection-option"><a href="students/changepassword/{{Auth::guard('students')->user()->id}}">Change Password</a></div>
                                    
                                        
                                    
                            </div>
                        </div>

                        <?php                           
                        $message = DB::table('message')->where('idStudent',Auth::guard('students')->user()->id)->where('status',0)->count('*');      
                        ?>

                        <div class="SidebarSection" style="width: 250px;">
                            <div class="SidebarSection-header">
                                <h4>Manage Issue/Return</h4>
                                
                            </div>
                            <div class="SidebarSection-content">
                                         <div class="SidebarSection-option"><a href="students/myorder/{{Auth::guard('students')->user()->id}}">My Requests</a></div>
                                        <div class="SidebarSection-option"><a href="students/mymessage/{{Auth::guard('students')->user()->id}}">My Messages ({!!$message!!})</a></div>
                                    
                                      

                                        <div class="SidebarSection-option"><a href="students/myborrowing/{{Auth::guard('students')->user()->id}}">My Borrowing Books</a></div>

                                        <div class="SidebarSection-option"><a href="students/myreturned/{{Auth::guard('students')->user()->id}}">My Returned Books History</a></div>                                                                          
                            </div>
                        </div>
                         <div class="SidebarSection" style="width: 250px;">
                            <div class="SidebarSection-header">
                                <h4>Notifications</h4>
                                
                            </div>
                            <div class="SidebarSection-content" style="font-size: 12px;">
                                
                                        <div class="SidebarSection-option">You have <strong>{!!$message!!} new unread messages </strong> from librarian</div>
                                                                                                            
                            </div>
                        </div>
                         
                   <div class="chat-box my-3 m-xs-4" style="width: 250px;">
                    
                    
                    <br>
                    <a href="emailus"> 
                        <img src="frontpage/img/email1.png" alt="" style="width:250px;padding-top:5px;">
                   </a>
                   <br>
                   

                  
                  </div> <!-- END CHATBOX AREA-->
                 
                      </div>