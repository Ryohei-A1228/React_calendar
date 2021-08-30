import React from 'react';

const info_style = {
    flex: {
        display: 'block'
    },
};

function Infomation(props) {
    return (
        <div>
            <h2>Hello</h2>
            <button>close</button>
            <div>I am a modal</div>
            <form>
            <input value={props.content} />
            <button style={info_style.flex}>tab navigation</button>
            <button style={info_style.flex}>stays</button>
            <button style={info_style.flex}>inside</button>
            <button style={info_style.flex}>the modal</button>
            </form>
        </div>
    );

    Infomation.defaultProps={
        content: ""
    };
}

export default Infomation;
