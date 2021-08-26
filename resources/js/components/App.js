import Calendar from 'react-calendar'
import Modal from 'react-modal';
import Infomation from './Infomation';
import 'react-calendar/dist/Calendar.css';

const styles = {
    content: {
      top: '50%',
      left: '50%',
      right: 'auto',
      bottom: 'auto',
      marginRight: '-50%',
      transform: 'translate(-50%, -50%)',
    },
  };


  Modal.setAppElement('#app');

function App() {
    let subtitle;
    const [modalIsOpen, setIsOpen] = React.useState(false);  
    function openModal() {
      setIsOpen(true);
    }
  
    function afterOpenModal() {
      // references are now sync'd and can be accessed.
      subtitle.style.color = '#f00';
    }
  
    function closeModal() {
      setIsOpen(false);
    }


    const [value, onChange] = useState(new Date());

    return (
        <div>
            <div className="container">
                <div className="m-auto">
                    <Calendar 
                        onChange={onChange}
                        value={value}
                    />

                </div>
                <button onClick={openModal}>Open Modal</button>
                <Modal
                isOpen={modalIsOpen}
                onAfterOpen={afterOpenModal}
                onRequestClose={closeModal}
                style={styles}
                contentLabel="Example Modal"
                >
                    <Infomation></Infomation>
                    
                </Modal>
            </div>
            
        </div>
    );
}


export default App;

if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}

