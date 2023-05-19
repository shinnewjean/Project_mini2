const outBtn = document.getElementById('out_button');

outBtn.addEventListener('click', () => {
    // confirm() : 사용자가 확인을 선택하면 confirmation 변수에 true가 저장되고, 취소를 선택하면 false가 저장
    const confirmation = confirm('탈퇴 하시겠습니까?');

    if(confirmation) {
        document.getElementById('modal_form').submit();
    }
});