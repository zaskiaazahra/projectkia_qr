function ReactWidget(){

    return React.createElement(
        "div",
        {
            className:
            "react-note"
        },

        "React Active"
    );
}

const reactRoot =
ReactDOM.createRoot(
    document.getElementById(
        "react-root"
    )
);

reactRoot.render(
    React.createElement(
        ReactWidget
    )
);