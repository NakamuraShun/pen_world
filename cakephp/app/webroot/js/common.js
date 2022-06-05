function confirmDelete()
{
	if (window.confirm('削除してもよろしいでしょうか？') == false){
		return false;
		// html側のonClickにfalseを記述すると「いいえ」で処理をキャンセルできる 
		// https://mintaku-blog.net/javascript-onclick/
	}
};

/* お問い合わせフォームの個人情報チェック */
// 読み込み時に false判定で disabled 属性を付与する
// 確認画面から戻る関数は実行されないが、チェック済み + html側で'disabled' => false になっている
window.onload = onLoad
function onLoad()
{
	confirmPrivacy()
}

function confirmPrivacy()
{
	let confirmPrivacyInput     = document.getElementsByClassName('js-confirm-privacy-input')[0]
	let confirmPrivacySubmitBtn = document.getElementsByClassName('js-confirm-privacy-submit-btn')[0]
	
	if (confirmPrivacyInput.checked)
	{
		confirmPrivacySubmitBtn.removeAttribute("disabled")
	}else{
		confirmPrivacySubmitBtn.setAttribute("disabled", "disabled")
	}
};

// form
function actionChangeSwitch(e)
{
	e.nextElementSibling.classList.toggle("display_none")
};
