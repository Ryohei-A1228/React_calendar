import React from 'react';
import './GoogleGet.css';

const info_style = {
    headline: {
        textAlign: 'center',
    },
    inp: {
        display: 'block',
        marginBottom: '10px',
        width: '100%',
        fontSize: '15px',
        border: 'none',
        borderRadius: '3px',
        boxShadow: 'none',
        padding: '2px 8px',
    },
    button:{
        display: 'inline-block',
        marginTop: '30px'
    },
};

function GoogleGet(props) {
    var csrf_token = props.csrf;

    return (
        <div style={info_style.headline}>
            <h2>Google Calendarから予定取得(2021年)</h2>
            <form method="POST" action="/event/get/goo">
                <input type="hidden" name="_token" value={ csrf_token } />
                <label style={info_style.p} for="exampleFormControlInput1" className="form-label">メールアドレス</label>
                <input style={info_style.inp} type='email' name='email' placeholder='自分のメースアドレス' class="form-control" required />
                <label style={info_style.p} for="exampleFormControlInput1" className="form-label">APIキー（GCPに接続して発行）</label>
                <input style={info_style.inp} type='text' name='api' placeholder='APIキー' class="form-control" required />
                <button type='submit' style={info_style.button} className="btn btn-warning">取得して保存</button>
            </form>
        </div>
    );

}

export default GoogleGet;
