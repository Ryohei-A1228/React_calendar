import React from 'react';
import './Infomation.css';
import { EmailShareButton, EmailIcon, LineShareButton, LineIcon, WhatsappShareButton, WhatsappIcon} from 'react-share';

const info_style = {
    headline: {
        textAlign: 'center',
    },
    p: {
        margin: '5px 0',
        borderRadius: '30%',
        display: 'block'
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
    ul: {
        listStyleType: 'none',
        paddingLeft: '0'
    },
    li: {
        textAlign: 'center',
        fontSize: '20px'
    },
    select: {
        display: 'flex',
        justifyContent: 'space-around'
    },
    timeSelect: {
        width:'20%',
        display: 'inline-block',
        textAlign: 'center'
    },
    share: {
        width: '50%',
        margin: '10px auto',
        display: 'flex',
        justifyContent: 'space-around',
        
    }
};

function Infomation(props) {
    var events = props.data;
    var logId = props.login_id;
    var csrf_token = props.csrf;
    const url = location.href;
    const share_body = props.date + 'について';

    return (
        <div>
            <h3 style={info_style.headline}>既存のイベント</h3>
            <ul style={info_style.ul}>
                <form method='POST' action='/event/delete'>
                    { events.map((val) => (props.value_day === val.date && props.user_id.some(item => item == val.user_id)) ? 
                    <li style={info_style.li}>{val.user.name+' '+val.title+' '+val.start_time+'~'+val.end_time+'  '}{(logId == val.user_id) ? <button type="submit" className="btn btn-danger">削除<input type='hidden' name='id' value={val.id} /><input type="hidden" name="_token" value={ csrf_token } /></button> : ''}</li> 
                    : '') } 
                </form>
            </ul>
            <div style={info_style.share}>
                <EmailShareButton url={url} body={share_body} >
                    <EmailIcon size={50} round/>
                </EmailShareButton>
                <LineShareButton url={url} title={share_body} >
                    <LineIcon size={50} round/>
                </LineShareButton>
                <WhatsappShareButton url={url} title={share_body} >
                    <WhatsappIcon size={50} round/>
                </WhatsappShareButton>
            </div>
            <form method="POST" action="/event/add">
                <h3 style={info_style.headline}>イベント追加</h3>
                <h5 style={info_style.headline}>{props.date}</h5>
                <input type='hidden' name='date' value={props.value_day} />
                <label style={info_style.p} for="exampleFormControlInput1" className="form-label">タイトル</label>  
                <input name="title" class="form-control" type="text" placeholder="タイトル" required />
                <div style={info_style.select}>
                    <div style={info_style.timeSelect}>
                        <label style={info_style.p} for="exampleFormControlInput1" className="form-label">開始時間</label> 
                        <select className="form-select form-select-sm" aria-label=".form-select-sm example" name="start_time" required>
                            <option value="0" selected>0時</option>
                            <option value="1" >1時</option>
                            <option value="2">2時</option>
                            <option value="3">3時</option>
                            <option value="4">4時</option>
                            <option value="5">5時</option>
                            <option value="6">6時</option>
                            <option value="7">7時</option>
                            <option value="8">8時</option>
                            <option value="9">9時</option>
                            <option value="10">10時</option>
                            <option value="11">11時</option>
                            <option value="12">12時</option>
                            <option value="13">13時</option>
                            <option value="14">14時</option>
                            <option value="15">15時</option>
                            <option value="16">16時</option>
                            <option value="17">17時</option>
                            <option value="18">18時</option>
                            <option value="19">19時</option>
                            <option value="20">20時</option>
                            <option value="21">21時</option>
                            <option value="22">22時</option>
                            <option value="23">23時</option>
                        </select>
                    </div>
                    <div style={info_style.timeSelect}>
                        <label style={info_style.p} for="exampleFormControlInput1" className="form-label">終了時間</label> 
                        <select className="form-select form-select-sm" aria-label=".form-select-sm example" name="end_time" required>
                            <option value="0" selected>0時</option>
                            <option value="1" >1時</option>
                            <option value="2">2時</option>
                            <option value="3">3時</option>
                            <option value="4">4時</option>
                            <option value="5">5時</option>
                            <option value="6">6時</option>
                            <option value="7">7時</option>
                            <option value="8">8時</option>
                            <option value="9">9時</option>
                            <option value="10">10時</option>
                            <option value="11">11時</option>
                            <option value="12">12時</option>
                            <option value="13">13時</option>
                            <option value="14">14時</option>
                            <option value="15">15時</option>
                            <option value="16">16時</option>
                            <option value="17">17時</option>
                            <option value="18">18時</option>
                            <option value="19">19時</option>
                            <option value="20">20時</option>
                            <option value="21">21時</option>
                            <option value="22">22時</option>
                            <option value="23">23時</option>
                        </select>
                    </div>
                </div>
                <div style={info_style.headline}>
                    <button type='submit' style={info_style.button} className="btn btn-warning">追加</button>
                </div>
            </form>
            <div style={info_style.headline}>
                <button type="button" style={info_style.button} onClick={props.close} className="btn btn-secondary">閉じる</button>
            </div>
        </div>
    );

}

export default Infomation;
