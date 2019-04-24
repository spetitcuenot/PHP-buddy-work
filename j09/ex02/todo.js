const cookies = document.cookie
    .split(';')
    .filter(c => c.split('=')[0] === 'todos')
    .map(c => c.slice(6, -1))
const list = document.getElementById('ft_list')

let todos = cookies.length ? JSON.parse(decodeURIComponent(cookies[0])) : [];

const render = () => {
    list.innerHTML = todos.map(todo => `<div>${todo}</div>`).join('\n')
};

document.getElementById('new').addEventListener('click', () => {
    const message = prompt('Todo content:')

    document.cookie.split(';')
    if (message && message.length) {
        todos = [message, ...todos]
        document.cookie = `todos=${encodeURIComponent(JSON.stringify(todos))}`
        render()
    }
})

render()
