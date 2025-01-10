import React, { useRef } from 'react'

export default function Registration() {
    let count = useRef()
    let imgChange = useRef()
    let cnt = 0;

    let isEmpty = useRef()

    const buttonClicked = (event)=>{
        event.preventDefault()
        cnt = cnt + 1;
        count.current.innerText = cnt;
        count.current.classList.remove('text-red-400')
        count.current.classList.add('text-green-500')

        imgChange.current.src = "https://dummyjson.com/image/400x200/282828";
        imgChange.current.setAttribute("width", '150')
    }

    const empty = ()=>{

    }

    const changeColor = ()=>{

    }

  return (
    <div>
      <form action="">
        <table>
            <tr>
                <td>
                    <label htmlFor="name">Name: </label>
                </td>
                <td>
                    <input type="text" />
                </td>
            </tr>
            <tr>
                <td>
                    <label htmlFor="password">Password</label>
                </td>
                <td>
                    <input type="password" />
                </td>
            </tr>
            <tr>
                <td>
                <button onClick={buttonClicked}>Submit</button>
                </td>
                <td>
                <button onClick={changeColor}>Reset</button>
                </td>
                
            </tr>
            <tr>
                <td>
                    <p class='text-sky-400'>Button Clicked: </p>
                </td>
                <td>
                <p ref={count} class="text-red-400">0</p>
                </td>
            </tr>
            <tr>
                <img ref={imgChange} src="https://dummyjson.com/image/150" alt="" />
            </tr>
        </table>
        
        
      </form>
    </div>
  )
}
