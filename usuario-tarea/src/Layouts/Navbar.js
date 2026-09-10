import { Link } from 'react-router-dom';

export default function Navbar() {
  return (

    <nav className="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div className="container">
        <a className="navbar-brand">
          React
        </a>
        <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span className="navbar-toggler-icon"></span>
        </button>

        <div className="collapse navbar-collapse" id="navbarSupportedContent">
          <ul className="navbar-nav me-auto">
            <li className="nav-item">
              <Link className="nav-link" to="/">Usuario</Link>
            </li>
          </ul>
          <ul className="navbar-nav me-auto">
            <li className="nav-item">
              <Link className="nav-link" to="/task">Tarea</Link>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  );
}
