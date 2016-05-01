@extends ('layouts.profile')
@section('main')
					<main class="col-xs-11 col-sm-10 messages">
						<div class="row">
							<div class="col-xs-12">
                <div class="row">
                  <div class="col-xs-3 names">
                    <ul class="nav nav-pills nav-stacked">
                      <?php $i = $j = 0 ; ?>
                      @foreach($chats as $name => $chat)
                      <li class="nav-item">
                        <a class="<?php echo ($i===0) ? "nav-link active"  : "nav-link" ;?>" href="#{{preg_replace('/\s+/', '', $name)}}" data-toggle="tab">
                          {{$name}}
                        </a>
                      </li>
                      <?php $i++; ?>
                      @endforeach
                    </ul>
                  </div>
                  <div class="tab-content col-xs-9">
                    @foreach($chats as $name => $chat)
                    <div class="<?php echo ($j===0) ? "tab-pane fade in active"  : "tab-pane fade" ;?>" id="{{preg_replace('/\s+/', '', $name)}}" role="tabpanel">
                      <div class="col-xs-9 chat">
                          <form class="row send-message" action="{{ url('profile/'.$user->id.'/message/') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="col-xs-10">
                              <?php
                                $teacher_id = ($user->typeOfUser() == 'teacher') ? $user->deriveable->id : $chat['id'];
                                $student_id = ($user->typeOfUser() == 'student') ? $user->deriveable->id : $chat['id'];
                              ?>
                              <input type="hidden" name="teacher_id" id="teacher_id" value="{{ $teacher_id }}">
                    					<input type="hidden" name="student_id" id="student_id" value="{{ $student_id }}">
                              <fieldset>
                                <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                              </fieldset>
                            </div>
                            <div class="col-xs-2">
                              <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                          </form>
                        <div class="row chat-data">
                          @foreach($chat['content'] as $content)
                            <?php
                              $className  = 'col-xs-7 single-message ';
                              $className .= ($content['sender'] == 'self') ? 'self col-xs-offset-5' : 'other' ;
                              $timestamp  = ($content['sender'] == 'self') ? 'Sent @ ' : 'Recieved @ ' ;
                            ?>
                            <div class="{{$className}}">
                              {{$content['message']}}
                              <small>
                                --&nbsp;{{$timestamp}}{{$content['time']->toDayDateTimeString()}}
                              </small>
                            </div>
                          @endforeach
                        </div>
                      </div>
                    </div>
                    <?php $j++; ?>
                    @endforeach
                  </div>
                </div>
							</div>
						</div>
					</main>
@endsection
