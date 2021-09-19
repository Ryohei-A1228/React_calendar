import React from 'react';
import './addFriend.css';

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
    }
};

function AddFriend(props) {
    var csrf_token = props.csrf;

    return (
        <div>
                
            <form method="POST" action="/friend/add">
                <input type="hidden" name="_token" value={ csrf_token } />
                <label style={info_style.p} for="exampleFormControlInput1" className="form-label">ユーザーネーム</label>
                <input type='text' name='name' placeholder='友達の名前' required />
                <label style={info_style.p} for="exampleFormControlInput1" className="form-label">e-mail</label>
                <input type='email' name='email' placeholder='友達のメールアドレス' required />
                <button type='submit' style={info_style.button} className="btn btn-warning">追加</button>
            </form>

        </div>
    );

}

export default AddFriend;
