
@extends('layout')

@section('css')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css">
    <style>
        input, th span {
            cursor: pointer;
        }
    </style>
@endsection
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="block">
                <div class="heading">
                    <div class="col-12">
                        <h2>Primary Information</h2>
                        <div class="info">

                            <div class="btn-group btn-group-sm" role="group" aria-label="Button group with nested dropdown">
                                <button type="button" class="btn indigo-bg white-font"><i class="fa fa-th-list"></i> Customer </button>
                                <button type="button" class="btn btn-secondary btn-info"><i class="fas fa-sign-out-alt"></i> Add New</button>

                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        More
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a id="csvBtn" class="dropdown-item" href="javascript:"> <i class="fa fa-file" aria-hidden="true"></i> CSV</a>
                                        <a id="excelBtn" class="dropdown-item" href="javascript:"> <i class="far fa-file-excel"></i> Excel</a>
                                        <a id="pdfBtn" class="dropdown-item" href="javascript:"> <i class="far fa-file-pdf"></i> PDF</a>
                                        <a id="printBtn" class="dropdown-item" href="javascript:"> <i class="fa fa-print" aria-hidden="true"></i> Print</a>
                                    </div>
                                </div>
                            </div>

                        </div><!-- end of info -->
                    </div>
                </div>
                <div class="col-12">
                    <table class="table table-striped table-bordered" style="width: 100%">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                        <th scope="col">Handle</th>
                        <th scope="col">Handle</th>
                        <th scope="col">Handle</th>
                        <th scope="col">Handle</th>
                        <th scope="col">Handle</th>
                        <th scope="col">Handle</th>
                        <th scope="col">Handle</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                    </tr>
                    </tbody>
                </table>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="block">
                <div class="heading">
                    <div class="col-12">
                        <h2>Primary Information</h2>
                        <div class="info">
                            <div class="icon"></div>
                            <div class="pop">
                                Product set up is critical for an easy-to-manage store. Take the time to add great types, tags, brand information, and descriptions now. It will pay off in the future when you're selling, reporting, or managing your business.
                            </div><!-- end of pop -->
                        </div><!-- end of info -->
                    </div>

                </div>
                <div class="col-12">
                    <div class="alert alert-secondary violet" role="alert">
                        <div class="alert-icon"><i class="far fa-bell" style="font-size: 30px;"></i></div>
                        <div class="alert-text">
                            Product set up is critical for an easy-to-manage store. Take the time to add great types, tags, brand information, and descriptions now. It will pay off in the future when you're selling, reporting, or managing your business.
                        </div>
                    </div>
                    <form>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Password">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Password">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <div class="block">
                <div class="heading">
                    <div class="col-12">
                        <h2>Primary Information</h2>
                        <div class="info">
                            <div class="icon"></div>
                            <div class="pop">
                                Product set up is critical for an easy-to-manage store. Take the time to add great types, tags, brand information, and descriptions now. It will pay off in the future when you're selling, reporting, or managing your business.
                            </div><!-- end of pop -->
                        </div><!-- end of info -->
                    </div>

                </div>
                <div class="col-12">
                    <div class="alert alert-secondary violet" role="alert">
                        <div class="alert-icon"><i class="far fa-bell" style="font-size: 30px;"></i></div>
                        <div class="alert-text">
                            Product set up is critical for an easy-to-manage store. Take the time to add great types, tags, brand information, and descriptions now. It will pay off in the future when you're selling, reporting, or managing your business.
                        </div>
                    </div>
                    <form>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="validationServer01">First name</label>
                                <input type="text" class="form-control is-valid" id="validationServer01" placeholder="First name" value="Mark" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationServer02">Last name</label>
                                <input type="text" class="form-control is-valid" id="validationServer02" placeholder="Last name" value="Otto" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationServerUsername">Username</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend3">@</span>
                                    </div>
                                    <input type="text" class="form-control is-invalid" id="validationServerUsername" placeholder="Username" aria-describedby="inputGroupPrepend3" required>
                                    <div class="invalid-feedback">
                                        Please choose a username.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="validationServer03">City</label>
                                <input type="text" class="form-control is-invalid" id="validationServer03" placeholder="City" required>
                                <div class="invalid-feedback">
                                    Please provide a valid city.
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationServer04">State</label>
                                <input type="text" class="form-control is-invalid" id="validationServer04" placeholder="State" required>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationServer05">Zip</label>
                                <input type="text" class="form-control is-invalid" id="validationServer05" placeholder="Zip" required>
                                <div class="invalid-feedback">
                                    Please provide a valid zip.
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" required>
                                <label class="form-check-label" for="invalidCheck3">
                                    Agree to terms and conditions
                                </label>
                                <div class="invalid-feedback">
                                    You must agree before submitting.
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </form>
                </div>

            </div>
            <div class="block">
                <div class="heading">
                    <div class="col-12">
                        <h2>Primary Information</h2>
                        <div class="info">
                            <div class="icon"></div>
                            <div class="pop">
                                Product set up is critical for an easy-to-manage store. Take the time to add great types, tags, brand information, and descriptions now. It will pay off in the future when you're selling, reporting, or managing your business.
                            </div><!-- end of pop -->
                        </div><!-- end of info -->
                    </div>

                </div>
                <div class="col-12">
                    <div class="alert alert-secondary violet" role="alert">
                        <div class="alert-icon"><i class="far fa-bell" style="font-size: 30px;"></i></div>
                        <div class="alert-text">
                            Product set up is critical for an easy-to-manage store. Take the time to add great types, tags, brand information, and descriptions now. It will pay off in the future when you're selling, reporting, or managing your business.
                        </div>
                    </div>
                    <div class="card card-body">
                        <form class="needs-validation" novalidate>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationTooltip01">First name</label>
                                    <input type="text" class="form-control" id="validationTooltip01" placeholder="First name" value="Mark" required>
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationTooltip02">Last name</label>
                                    <input type="text" class="form-control" id="validationTooltip02" placeholder="Last name" value="Otto" required>
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationTooltipUsername">Username</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                                        </div>
                                        <input type="text" class="form-control" id="validationTooltipUsername" placeholder="Username" aria-describedby="validationTooltipUsernamePrepend" required>
                                        <div class="invalid-tooltip">
                                            Please choose a unique and valid username.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationTooltip03">City</label>
                                    <input type="text" class="form-control" id="validationTooltip03" placeholder="City" required>
                                    <div class="invalid-tooltip">
                                        Please provide a valid city.
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationTooltip04">State</label>
                                    <input type="text" class="form-control" id="validationTooltip04" placeholder="State" required>
                                    <div class="invalid-tooltip">
                                        Please provide a valid state.
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationTooltip05">Zip</label>
                                    <input type="text" class="form-control" id="validationTooltip05" placeholder="Zip" required>
                                    <div class="invalid-tooltip">
                                        Please provide a valid zip.
                                    </div>
                                </div>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Check this custom checkbox</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio1">Toggle this custom radio</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio2">Or toggle this other custom radio</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline1">Toggle this custom radio</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline2">Or toggle this other custom radio</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                <label class="custom-control-label" for="customSwitch1">Toggle this switch element</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" disabled id="customSwitch2">
                                <label class="custom-control-label" for="customSwitch2">Disabled switch element</label>
                            </div>
                            <select class="custom-select">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <select class="selectpicker">
                                <option>Mustard</option>
                                <option>Ketchup</option>
                                <option>Relish</option>
                            </select>
                            <select class="selectpicker">
                                <optgroup label="Picnic">
                                    <option>Mustard</option>
                                    <option>Ketchup</option>
                                    <option>Relish</option>
                                </optgroup>
                                <optgroup label="Camping">
                                    <option>Tent</option>
                                    <option>Flashlight</option>
                                    <option>Toilet Paper</option>
                                </optgroup>
                            </select>
                            <select class="selectpicker" multiple>
                                <option>Mustard</option>
                                <option>Ketchup</option>
                                <option>Relish</option>
                            </select>
                            <select class="selectpicker" data-live-search="true">
                                <option data-tokens="ketchup mustard">Hot Dog, Fries and a Soda</option>
                                <option data-tokens="mustard">Burger, Shake and a Smile</option>
                                <option data-tokens="frosting">Sugar, Spice and all things nice</option>
                            </select>
                            <select class="selectpicker" multiple title="Choose one of the following...">
                                <option>Mustard</option>
                                <option>Ketchup</option>
                                <option>Relish</option>
                            </select>
                            <select class="selectpicker" data-style="btn-info">
                                <option>Mustard</option>
                                <option>Ketchup</option>
                                <option>Relish</option>
                            </select>


                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            <div class="col-md-12">
               <textarea id="editor">
Lorem <b>ipsum </b><i>dolor </i><strike>sit</strike> <u>amet</u>, <b><i>consectetur</i></b> <u><strike>adipiscing</strike></u> elit, <i><u>sed</u></i> do eiusmod tempor incididunt ut labore et dolore magna aliqua.
<div style="text-align: center;">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
<div style="text-align: right;">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</div>
<div>
<ul>
    <li>Excepteur sint occaecat cupidatat non proident.<br></li>
    <li>Sunt in culpa qui officia deserunt mollit anim id est laborum.<br></li>
</ul>
</div>
</textarea>
                            </div>
                            <div class="form-group">
                                <label>Example of select</label>
                                <select id="select-single" placeholder="Choose one thing" data-allow-clear="1">
                                    <option></option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Example of multiple select</label>
                                <select multiple placeholder="Choose anything" data-allow-clear="1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Example of disabled select</label>
                                <select disabled placeholder="Cannot choose">
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Example of select with optgroup</label>
                                <select placeholder="Choose one thing">
                                    <option></option>
                                    <optgroup label="Group A">
                                        <option>A1</option>
                                        <option>A2</option>
                                        <option>A3</option>
                                    </optgroup>
                                    <optgroup label="Group B">
                                        <option>B1</option>
                                        <option>B2</option>
                                        <option>B3</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Example of input-group</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Prepend</span>
                                    </div>
                                    <select placeholder="Choose on thing">
                                        <option></option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="separator"></div>
                            <div class="line aligncenter">
                                <button class="btn btn-primary" type="submit">Submit form</button>
                                <button type="reset" value="Cancel">Cancel</button>
                                <button type="submit" value="Create" disabled="">Create</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
        <div class="col-4">
            <div class="block">
                <div class="row">
                    <div class="contain animated bounce">
                        <form id="form1" runat="server">
                            <div class="alert"></div>
                            <div id='img_contain'><img id="blah" align='middle' src="http://www.clker.com/cliparts/c/W/h/n/P/W/generic-image-file-icon-hi.png" alt="your image" title=''/></div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" id="inputGroupFile01" class="imgInp custom-file-input" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                        </form>
                        <div class="credit">Modified using <a target="_blank" href="https://stackoverflow.com/questions/4459379/preview-an-image-before-it-is-uploaded">Ivan Baev's</a> code.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection