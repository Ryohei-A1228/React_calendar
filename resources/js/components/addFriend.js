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

function Infomation(props) {
    var events = props.data;

    return (
        <div>
            <h3 style={info_style.headline}>既存のイベント</h3>
            <ul style={info_style.ul}>
                { events.map((val) => (props.value_day === val.date) ? <li style={info_style.li}>{val.user.name+' '+val.title+' '+val.time+'~'}</li> : '') }
            </ul>
            <form method="POST" action="/event/add">
                
                <div style={info_style.headline}>
                    <button type='submit' style={info_style.button} className="btn btn-warning">追加</button>
                </div>
            </form>

        </div>
    );

}

export default Infomation;
