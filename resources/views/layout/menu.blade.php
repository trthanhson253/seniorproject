<div class="LandingPageNav is-desktop">
                
                        <!-- <div class="SidebarSection" style="width: 250px;">
                            <div class="SidebarSection-header">
                                <h4>Categories List</h4>
                                
                            </div>
                            
                        </div> -->
                         @foreach($cates as $ct)
                         @if(count($ct->subCates)>0)
                        <div class="SidebarSection" style="width: 250px;">
                         
                            <div class="SidebarSection-header">

                                <h4><img src="frontpage/img/icon/bookshelf.png" style="width:20px;"><a style="color:black;" href="cates/{{$ct->id}}"> {{$ct->name}}</a></h4>
                                
                            </div>
                            
                            <div class="SidebarSection-content">   
                            @foreach($ct->subCates as $sc)                          
                                       <div class="SidebarSection-option" style="font-weight: 10px;"><a href="cates/subcates/{{$sc->id}}"><img src="frontpage/img/icon/right.png" style="width:20px;"> {{$sc->name}}</a></div>
                                   @endforeach
                            </div>
                            
                        </div>
                         @endif
                        @endforeach
                         <!-- CHAT BOX AREA -->
                  <div class="chat-box my-3 m-xs-4" style="width: 250px;">
                    
                    <fieldset class="form-fields">
                    <legend style="font-weight: bold;font-size: 18px;"><img src="frontpage/img/chat1.png" alt="" style="width:250px;"></legend>
                   
                    
                    <div class="subiz_status" align="center"></div>
                   <!--  @if(Auth::guard('students')->check())
                    
                        @if($students)
                            @foreach($students as $st)
                              @if($st->isOnline())                               
                                <img src="frontpage/img/chat1.png" alt="" style="width:250px;">
                                <img src="frontpage/img/online.jpg" alt="" style="width:250px;">
                                <br>
                                <div class="Chat-button Chat-online" style="display: block;" align="center">
                                  <div class="Button-container">
                                      <button class="Button" type="button" onclick="window.open('http://localhost/seniorproject/public/send-message','_blank','height=600,width=600')">
                                          <img src="frontpage/img/chatonline.png">
                                          Chat Now
                                      </button>
                                  </div>
                                </div>                                
                              @else                              
                                <img src="frontpage/img/chat1.png" alt="" style="width:250px;">
                                <img src="frontpage/img/offline.jpg" alt="" style="width:250px;">
                                <div class="Chat-button Chat-offline" style="display: block;">
                                <div class="Button-container is-disabled">
                                    <button class="Button" type="button">
                                        <img src="frontpage/img/chatonline.png">
                                        Chat Unavailable
                                    </button>
                                </div>
                            </div>                               
                              @endif
                            @endforeach
                      @endif                   
                    @else                   
                         @if($students)
                            @foreach($students as $st)
                              @if($st->isOnline())
                                
                                <img src="frontpage/img/chat1.png" alt="" style="width:250px;">
                                <img src="frontpage/img/online.jpg" alt="" style="width:250px;">
                                <div class="Chat-button Chat-online" style="display: block;" align="center">
                                  <div class="Button-container">
                                    <a href="login"> 
                                      <button class="Button" type="button">
                                          <img src="frontpage/img/chatonline.png">
                                          Chat Now
                                      </button>
                                    </a>
                                  </div>
                                </div>      
                                  
                              @else
                              <img src="frontpage/img/chat1.png" alt="" style="width:250px;">
                                <img src="frontpage/img/offline.jpg" alt="" style="width:250px;">
                                <div class="Chat-button Chat-offline" style="display: block;">
                                <div class="Button-container is-disabled">
                                    <button class="Button" type="button">
                                        <img src="frontpage/img/chatonline.png">
                                        Chat Unavailable
                                    </button>
                                </div>
                            </div>        
                              @endif
                            @endforeach
                      @endif
                    @endif -->

                   
                    </fieldset> 
                    <br>
                    <a href="emailus"> 
                        <img src="frontpage/img/email1.png" alt="" style="width:250px;padding-top:5px;">
                   </a>
                   <br>
                   
                   
                  
                  </div> <!-- END CHATBOX AREA-->
                 
                      </div>