// $(document).ready(function(){
    
//     $.ajax({ // 조회수 업
//         type: "POST",
//         url: "./action/hits_up1.php",
//         data: {
//             no: $("#post_no").val()
//         },
//         dataType: "text"
//     });
//     $(".btn-project-action").click(function(e){
//         e;
//         $("#form_container").slideDown();
//     });
// });
$(document).ready(function(){
    $(".btn-project-end").click(function(e){
        e.preventDefault();

        alert("신청기간이 아닙니다.");
    })

    $(".btn-project-user").click(function(e){
        e.preventDefault();
        alert("이 버튼이랑 카테고리 추가 할까요?");
    });
    

    $("#brn_form_submit").click(function(e){
        e.preventDefault();
        if($("#form_name").val() == ''){
            alert("이름을 입력해주세요.");
            $("#form_name").focus();
            return false;
        }
        // var test = "/^\d{3,4}-\d{4,5}-\d{5}$/";
        if (($("#form_call").val().length) != (13 || 12)){
            alert("연락처를 입력해주세요.\n ex)010-1234-1234");
            $("#form_call").focus();
            return false;
        }

        if($("#form_email").val() == ''){
            alert("이메일을 입력해주세요.");
            $("#form_email").focus();
            return false;
        }
        
        if($("#form_class").val() == ''){
            alert("소속을 입력해주세요.");
            $("#form_class").focus();
            return false;
        }
        // 파일 업로드 할 경우
        if($("#form_file").length != 0){
            if($("#form_file").val() == ''){
                alert("파일을 올려주세요.");
                return false;
            }else{
            // 파일 업로드 시 ajax 을 통해 폼 데이터를 넘김
                if(!confirm("작성하시겠습니까?")) return;
                var form = $("#form_action")[0];
                var data = new FormData(form);
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type: "POST",
                    enctype: 'multipart/form-data',
                    url: '{{ route("education.action") }}',
                    data: data,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    cache: false,
                    timeout: 600000,
                    success: function (args) {
                        console.log(args);
                        alert("신청이 완료되었습니다.");
                        $("#brn_form_submit").prop("disabled", false);
                        location.reload();
                    },
                    error: function (err) {
                        console.log("ERROR : ", err);
                        $("#brn_form_submit").prop("disabled", false);
                        alert('신청에 실패하였습니다.');
                    }
                });
            }
        }else{
            // 제출파일이 없을 경우
            if(!confirm("작성하시겠습니까?")) return;
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: "POST",
                url: "/education/receipt",
                data: {
                    project_page : $("#project_page").val(),
                    form_name : $("#form_name").val(),
                    form_call : $("#form_call").val(),
                    form_email : $('#form_email').val(),
                    form_class : $('#form_class').val()
                },
                dataType: "json",
                success: function(args){
                    if(args == 0){
                        alert("신청이 완료되었습니다.");
                        console.log(args);
                        location.reload();
                    } else {
                        alert (args);
                        console.log(args);
                        alert("신청에 실패하였습니다.");
                    }
                }
            });
        }
    });
});