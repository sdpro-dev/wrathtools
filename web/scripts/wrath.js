import React, {ReactDOM, useState} from 'react';

function Hookers() {
    const [count, setCount] = useState;

    return (
      <section>
          
        <h2>This is a hook example {count}</h2>
          <button onClick={() => setCount(count + 1)}>Press Me</button>
      </section>
    );
}

const domContainer = document.getElementById("react-app");
ReactDOM.render(Hookers(),  domContainer);