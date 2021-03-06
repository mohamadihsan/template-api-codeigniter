<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,500i,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.rawgit.com/enyo/dropzone/master/dist/dropzone.css">

<style>
.files input {
    /* outline: 2px dashed #92b0b3; */
    outline-offset: -10px;
    -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
    transition: outline-offset .15s ease-in-out, background-color .15s linear;
    padding: 120px 0px 85px 35%;
    text-align: center !important;
    margin: 0;
    width: 100% !important;
}
.files input:focus{     outline: 2px dashed #92b0b3;  outline-offset: -10px;
    -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
    transition: outline-offset .15s ease-in-out, background-color .15s linear; border:1px solid #92b0b3;
 }
.files{ position:relative}
.files:after {  pointer-events: none;
    position: absolute;
    top: 60px;
    left: 0;
    width: 75px;
    right: 0;
    height: 75px;
    content: "";
    background-image: url(<?= base_url('assets/img/upload.png')?>);
    display: block;
    margin: 0 auto;
    background-size: 100%;
    background-repeat: no-repeat;
}
.color input{ background-color:#ffffff;}
.files:before {
    position: absolute;
    bottom: 0px;
    left: 0;  pointer-events: none;
    width: 100%;
    right: 0;
    height: 57px;
    content: " DRAG & DROP HERE OR CLICK ";
    display: block;
    margin: 0 auto;
    /* color: #2ea591; */
    font-weight: 300;
    text-transform: capitalize;
    text-align: center;
}
</style>

<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4 katapanda-hide-element">
        <div class="d-flex flex-row">
            
            <div class="card h-100">
                <a href="<?= site_url('report/stock') ?>" class="card-body" style="color: #757575; text-decoration: none;">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Document ACCDBRG</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="sumACCDBRG" class="numbers"></span></div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span class="text-secondary mr-2"><i class="far fa-calendar"></i></span>
                                <span id="lastUpdateACCDBRG"></span><br/>
                                <span>last update</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-cubes fa-2x text-secondary"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="card h-100 ml-2">
                <a href="<?= site_url('langganan') ?>" class="card-body" style="color: #757575; text-decoration: none;">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Document ACCDLGN</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="sumACCDLGN" class="numbers"></span></div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span class="text-info mr-2"><i class="far fa-calendar"></i></span>
                                <span id="lastUpdateACCDLGN"></span><br/>
                                <span>last update</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="far fa-address-book fa-2x text-info"></i>
                        </div>
                    </div>   
                </a>
            </div>
            <div class="card h-100 ml-2">
                <a href="<?= site_url('report/sales') ?>" class="card-body" style="color: #757575; text-decoration: none;">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Document ACCARBON</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="sumACCARBON" class="numbers"></span></div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span class="text-success mr-2"><i class="far fa-calendar"></i></span>
                                <span id="lastUpdateACCARBON"></span><br/>
                                <span>last update</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="far fa-file-alt fa-2x text-success"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="card h-100 ml-2">
                <a href="<?= site_url('accardat/tagihan/klik2') ?>" class="card-body" style="color: #757575; text-decoration: none;">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Document ACCARDAT</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="sumACCARDAT" class="numbers"></span></div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span class="text-dark mr-2"><i class="far fa-calendar"></i></span>
                                <span id="lastUpdateACCARDAT"></span><br/>
                                <span>last update</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-2x text-dark"></i>
                        </div>
                    </div>   
                </a>
            </div>
        </div>
    </div>

	<div class="row my-4">
		<div class="col">
			<div class="jumbotron" style="padding: 1rem 2rem">
				<h1><?= $title ?></h1>
				<p class="text-muted">Please select type of document before upload!</p>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="label-katapanda-sm" for="typeOfDocument">Type of Document <span class="text-danger">*</span></label>
                        <select name="typeOfDocument" id="typeOfDocument" class="selectpicker form-control form-control-md"  data-live-search="true"  title="Choose" style="border-color: #fff;">
                            <option value="ACCDBRG">Document ACCDBRG</option>
                            <option data-divider="true"></option>
                            <option value="ACCDLGN">Document ACCDLGN</option>
                            <option data-divider="true"></option>
                            <option value="ACCARBON">Document ACCARBON</option>
                            <option data-divider="true"></option>
                            <option value="ACCARDAT">Document ACCARDAT</option>
                        </select>
                        <span id="errorTypeOfDocument"></span>
                    </div> 
                    <div class="form-group col-md-4">
                        <span id="templateDocument"></span>
                    </div>
                    <div class="form-group col-md-12 d-none" id="fileUpload1">
                        <label class="label-katapanda-sm" for="File">File Document (Max: 10MB) <span class="text-danger">*</span></label>
            
                        <form action="" method="post" class="dropzone dz-clickable" id="" enctype="multipart/form-data">
                            <div class="dz-message d-flex flex-column">
                                <i class="material-icons text-muted">cloud_upload</i>
                                Drag &amp; Drop here or click
                            </div>
                        </form>
                        <button type="button" class="btn bg-custom btn-block" id="btn_upload">UPLOAD</button>
                    </div>
                    <div class="form-group col-md-12 d-none" id="fileUpload2">
                        <form method="post" action="#" id="#">
                            <div class="form-group files color">
                                <label class="label-katapanda-sm" for="File">File Document (Max: 10MB) <span class="text-danger">*</span></label>
                                <input type="file" id="file-upload" class="form-control" multiple="" style="">
                                <div id="file-upload-filename"></div>
                            </div>
                        </form>
                        <button type="button" class="btn bg-custom btn-block" id="btnUpload" style="margin-top: -15px">UPLOAD</button>
                    </div>
                </div>        
				
			</div>
		</div>

	</div>
</div>

<script src="https://cdn.rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>

<script>
    $('#typeOfDocument').change(function() {
        $("#fileUpload1").removeClass("d-none");
    })
</script>

<script>

$(document).ready( function () {
    // init
    getData();
    $('#btnUpload').addClass("d-none");

    $('#file-upload').change(function(e) {
        $('#btnUpload').removeClass("d-none");
        // console.log(e.target.files[0]);
    })

    $.fn.digits = function(){ 
        return this.each(function(){ 
            $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") ); 
        })
    }
})

Dropzone.autoDiscover = false;

var start_time = '';
var myDropzone = new Dropzone(".dropzone", { 
    url: `<?= site_url() ?>api/web/v1/import-document`,
    headers: {
        Authorization: 'Bearer <?= $token ?>' 
    },
    paramName: "file",
    autoProcessQueue: false,
    parallelUploads : 100,
    timeout: 9000,
    uploadMultiple: false, 
    maxFiles: 1,
    maxFilesize: 25,
    addRemoveLinks: true,
    acceptedFiles: ".xlsx, .xls",
    init: function() {
        this.on("maxfilesexceeded", function(file){
            notification('upload', 'error', 'No more files please!');
        });
        this.on('success', function(file, resp){
            // console.log(file);
            // console.log(resp);
        });
        this.on('error', function(file, data) {
            // console.log(data);
        });
    },
    accept: function(file, done) {
        // console.log("upload");
        done();
    },
    maxfilesexceeded: function(file) {
        this.removeFile(file);
        // this.removeAllFiles();
        // this.addFile(file);
    },
    sending: function(file, xhr, data){
        // console.log('sending');
        data.append('type_document', $('#typeOfDocument').val());
        xhr.ontimeout = (() => {
          /*Execute on case of timeout only*/
            console.log('Server Timeout')
        });
        // xhr.addEventListener("load", () => {
        //     console.log(xhr.status);
        //     notification('upload', 'error', 'Server has a problem. Please contact Administartor!');    
            
        // });
    },
    uploadprogress: function(file, progress, bytesSent) {
        start_time = new Date().getTime();
        // console.log('Loading ' + progress);
        // start loading
        loadingStart('body', `<div class="spinner-grow text-primary" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <div class="spinner-grow text-success" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <div class="spinner-grow text-danger" role="status">
                                <span class="sr-only">Loading...</span>
                            </div><br/>
                            Don't Close This Page <br/>while Importing`);
    },
    success: function (file, response) {
        // console.log(response);
        let timeExecution = 'Time process: ' + msToTime(new Date().getTime() - start_time);
        let status = 'info';
        let message = 'Upload successfully...! ' + timeExecution;
        if (response.status == true) {
            status = 'info';
            message = response.message + ' ' + timeExecution;
        } else if (response.status == false) {
            status = 'warning';
            message = response.message;
        }
        getData();
        notification('upload', status, message);    

    },
    complete: function(file) {
        
        this.removeFile(file);
        // stop loading
        loadingStop()
    }
});

$('#btn_upload').click(function(){
    if ($('#typeOfDocument').val() == '') {
        $('#errorTypeOfDocument').html('<span class="text-katapanda-sm text-custom">Please enter Type of Document</span>')
    }else{
        myDropzone.processQueue();
    }
    
});

$('#typeOfDocument').change(function() {
    let type = $('#typeOfDocument').val();
    let link = '';

    if (type == 'ACCDBRG') {
        link = `<?= base_url('assets/template-document/ACCDBRG.xlsx') ?>`;
    } else if (type == 'ACCDLGN') {
        link = `<?= base_url('assets/template-document/ACCDLGN.xlsx') ?>`;
    } else if (type == 'ACCARBON') {
        link = `<?= base_url('assets/template-document/ACCARBON.xlsx') ?>`;
    } else if (type == 'ACCARDAT') {
        link = `<?= base_url('assets/template-document/ACCARDAT.xlsx') ?>`;
    } 
    $('#templateDocument').html(`<label class="label-katapanda-sm" for="downloadTemplate">
                                    Template document
                                </label><br/>
                                <a href="${link}" class="btn btn-sm btn-outline-primary" title="Download template document">
                                    <i class="fa fa-download"></i>
                                </a>`);
})

// get data dashboard
function getData() {
    $('#sumKTP').html(`<div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>`);
    $('#sumNPWP').html(`<div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>`);
    $('#sumACCDBRG').html(`<div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>`);
    $('#sumACCDLGN').html(`<div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>`);
    $('#sumACCARBON').html(`<div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>`);
    $('#sumACCARDAT').html(`<div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>`);
    $('#sumTagihan').html(`<div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>`);
    $('#totalPenjualan').html(`<div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>`);

    axios({
        method: `GET`,
        url: `<?= site_url() ?>api/web/v1/dashboard`,
        headers: {
            Authorization: 'Bearer <?= $token ?>' 
        }
    })
    .then(function (response) {
        // console.log(response);
        
        $('#sumACCDBRG').text(response.data.data.accdbrg.total_rows + ' Data');
        $('#lastUpdateACCDBRG').text(moment(response.data.data.accdbrg.last_update, 'YYYY-MM-DD hh:mm:ss').format('DD-MM-YYYY hh:mm:ss'));
        $('#sumACCDLGN').text(response.data.data.accdlgn.total_rows + ' Data');
        $('#lastUpdateACCDLGN').text(moment(response.data.data.accdlgn.last_update, 'YYYY-MM-DD hh:mm:ss').format('DD-MM-YYYY hh:mm:ss'));
        $('#sumACCARBON').text(response.data.data.accarbon.total_rows + ' Data');
        $('#lastUpdateACCARBON').text(moment(response.data.data.accarbon.last_update, 'YYYY-MM-DD hh:mm:ss').format('DD-MM-YYYY hh:mm:ss'));
        $('#sumACCARDAT').text(response.data.data.accardat.total_rows + ' Data');
        $('#lastUpdateACCARDAT').text(moment(response.data.data.accardat.last_update, 'YYYY-MM-DD hh:mm:ss').format('DD-MM-YYYY hh:mm:ss'));
        
        $("span.numbers").digits();
    })
    .catch(function (error) {
        // console.log(error);
        $('#sumKTP').text('Not Found');
        $('#lastUpdateKTP').text('-');
    })
}

function msToTime(duration) {
    let milliseconds = parseInt((duration % 1000) / 100),
        seconds = Math.floor((duration / 1000) % 60),
        minutes = Math.floor((duration / (1000 * 60)) % 60),
        hours = Math.floor((duration / (1000 * 60 * 60)) % 24);

    hours = (hours < 10) ? "0" + hours : hours;
    minutes = (minutes < 10) ? "0" + minutes : minutes;
    seconds = (seconds < 10) ? "0" + seconds : seconds;

    return hours + ":" + minutes + ":" + seconds + "." + milliseconds;
}

</script>