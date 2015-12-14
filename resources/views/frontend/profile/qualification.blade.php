@extends ('layouts.profile')
@section('main')
    <main class="col-xs-10 signup">
        <div class="gutter-sm"></div>
        <h2>Teacher Signup</h2>
        <h4 class="pull-right">Profile | 1 of 4 steps completed</h4>
        <div class="gutter-sm"></div>
        <div class="row sections">
            <div class="col-xs-2">
                <a href="personal"><span>1</span>PERSONAL</a>
            </div>
            <div class="col-xs-offset-1 col-xs-2">
                <a href="qualification"><span>2</span>QUALIFICATION</a>
            </div>
            <div class="col-xs-offset-1 col-xs-2">
                <a href="subjects"><span>3</span>SUBJECTS</a>
            </div>
            <div class="col-xs-offset-1 col-xs-2">
                <a href="calendar"><span>4</span>CALENDAR</a>
            </div>
        </div>
        <div class="gutter-sm"></div>
        <div class="signupqualification">
            <form>
                <div class="row">
                    <div class="col-xs-2">
                        <h5>Graduate College 1</h5>
                    </div>
                    <div class="col-xs-offset-1 col-xs-2">
                        <fieldset class="form-group">
                            <select class="form-control c-select">
                                <option selected>College</option>
                                <option value="1">IIT Delhi</option>
                                <option value="2">IIT Roorkee</option>
                                <option value="3">IIT Madras</option>
                            </select>
                        </fieldset>
                    </div>
                    <div class="col-xs-offset-1 col-xs-2">
                        <h5>Experience</h5>
                    </div>
                    <div class="col-xs-offset-1 col-xs-2">
                        <fieldset class="form-group">
                            <select class="form-control c-select">
                                <option selected>None</option>
                                <option value="1">1 yr</option>
                                <option value="2">2 yr</option>
                                <option value="3">3 yr</option>
                            </select>
                        </fieldset>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-2">
                        <h5>Degree</h5>
                    </div>
                    <div class="col-xs-offset-1 col-xs-2">
                        <fieldset class="form-group">
                            <select class="form-control c-select">
                                <option selected>Degree</option>
                                <option value="1">B.Tech.</option>
                                <option value="2">M.Tech.</option>
                                <option value="3">Dual Degree</option>
                            </select>
                        </fieldset>
                    </div>
                    <div class="col-xs-offset-1 col-xs-2">
                        <h5>Resume</h5>
                    </div>
                    <div class="col-xs-3">
                        <fieldset class="form-group">
                            <input type="file" id="file" class="form-control">
                        </fieldset>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-2">
                        <h5>Branch</h5>
                    </div>
                    <div class="col-xs-offset-1 col-xs-2">
                        <fieldset class="form-group">
                            <input type="text" class="form-control">
                        </fieldset>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-xs-2">
                        <h5>College Verification</h5>
                    </div>
                    <div class="col-xs-3">
                        <fieldset class="form-group">
                            <input type="file" id="file" class="form-control">
                        </fieldset>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row addanothercollege" id="#addanothercollege">
                    <div class="col-xs-2">
                        <a class="btn btn-primary add">Add another college</a>
                    </div>
                    <div class="col-xs-offset-1 col-xs-2">
                        <a class="btn btn-primary remove hide">Remove added college</a>
                    </div>
                </div>
                <div class="gutter-sm"></div>
                <div class="row">
                    <div class="col-xs-3">
                        <h5>Are you Ok with Home Tuition?</h5>
                    </div>
                    <div class="col-xs-9">
                        <div class="radio">
                            <label class="radio-inline">
                                <input type="radio" name="hometuition" id="hometuition" value="yes"> yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="hometuition" id="hometuition" value="no"> no
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        <h5>Languages</h5>
                    </div>
                    <div class="col-xs-3">
                        <div class="c-inputs-stacked">
                            <label class="c-input c-checkbox">
                                <input id="radioStacked1" name="radio-stacked" type="checkbox">
                                <span class="c-indicator"></span>
                                English
                            </label>
                            <label class="c-input c-checkbox">
                                <input id="radioStacked1" name="radio-stacked" type="checkbox">
                                <span class="c-indicator"></span>
                                Hindi
                            </label>
                            <label class="c-input c-checkbox">
                                <input id="radioStacked1" name="radio-stacked" type="checkbox">
                                <span class="c-indicator"></span>
                                Assamese
                            </label>
                            <label class="c-input c-checkbox">
                                <input id="radioStacked1" name="radio-stacked" type="checkbox">
                                <span class="c-indicator"></span>
                                Sanskrit
                            </label>
                            <label class="c-input c-checkbox">
                                <input id="radioStacked1" name="radio-stacked" type="checkbox">
                                <span class="c-indicator"></span>
                                Bengali
                            </label>
                            <label class="c-input c-checkbox">
                                <input id="radioStacked1" name="radio-stacked" type="checkbox">
                                <span class="c-indicator"></span>
                                Malyalam
                            </label>
                            <label class="c-input c-checkbox">
                                <input id="radioStacked1" name="radio-stacked" type="checkbox">
                                <span class="c-indicator"></span>
                                Tamil
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="c-inputs-stacked">
                            <label class="c-input c-checkbox">
                                <input id="radioStacked1" name="radio-stacked" type="checkbox">
                                <span class="c-indicator"></span>
                                Gujarati
                            </label>
                            <label class="c-input c-checkbox">
                                <input id="radioStacked1" name="radio-stacked" type="checkbox">
                                <span class="c-indicator"></span>
                                Marathi
                            </label>
                            <label class="c-input c-checkbox">
                                <input id="radioStacked1" name="radio-stacked" type="checkbox">
                                <span class="c-indicator"></span>
                                Telugu
                            </label>
                            <label class="c-input c-checkbox">
                                <input id="radioStacked1" name="radio-stacked" type="checkbox">
                                <span class="c-indicator"></span>
                                Oriya
                            </label>
                            <label class="c-input c-checkbox">
                                <input id="radioStacked1" name="radio-stacked" type="checkbox">
                                <span class="c-indicator"></span>
                                Urdu
                            </label>
                            <label class="c-input c-checkbox">
                                <input id="radioStacked1" name="radio-stacked" type="checkbox">
                                <span class="c-indicator"></span>
                                Kannada
                            </label>
                            <label class="c-input c-checkbox">
                                <input id="radioStacked1" name="radio-stacked" type="checkbox">
                                <span class="c-indicator"></span>
                                Punjabi
                            </label>
                        </div>
                    </div>
                </div>
                <div class="gutter-sm"></div>
                <div class="row">
                    <div class="col-xs-2">
                        <button type="submit" class="btn btn-primary">SAVE</button>
                    </div>
                    <div class="col-xs-offset-1 col-xs-2">
                        <button type="submit" class="btn btn-primary">SKIP FOR NOW</button>
                    </div>
                </div>
                <div class="gutter-md"></div>
            </form>
        </div>
    </main>
@endsection