document.addEventListener("DOMContentLoaded", () => {
  const tabla = document.querySelector("#tablaEmpleados tbody");
  const form = document.getElementById("formAgregar");

  let editId = null;
  let imagenActual = null;

  cargarEmpleados();

  form.addEventListener("submit", async (e) => {
    e.preventDefault();

    const formData = new FormData(form);
    if (editId) {
      formData.append("id", editId);
      formData.append("imagen_actual", imagenActual);
    }

    const url = editId ? "editar_empleado.php" : "crear_empleado.php";

    const response = await fetch(url, {
      method: "POST",
      body: formData,
    });

    const data = await response.json();

    if (data.success) {
      Swal.fire("¡Éxito!", data.message, "success");
      form.reset();
      editId = null;
      imagenActual = null;
      form.removeAttribute("data-edit-id");
      cargarEmpleados();
    } else {
      Swal.fire("Error", data.error || "Algo salió mal", "error");
    }
  });

  async function cargarEmpleados() {
    // Limpieza controlada del tbody (sin innerHTML)
    while (tabla.firstChild) {
      tabla.removeChild(tabla.firstChild);
    }
  
    // 🌀 Spinner temporal mientras carga
    const loadingRow = document.createElement("tr");
    loadingRow.innerHTML = `
      <td colspan="6" class="text-center py-3">
        <div class="spinner-border text-primary" role="status">
          <span class="visually-hidden">Cargando...</span>
        </div>
      </td>`;
    tabla.appendChild(loadingRow);
  
    try {
      const res = await fetch("obtener_empleados.php");
      const empleados = await res.json();
  
      // Eliminar spinner antes de mostrar resultados
      while (tabla.firstChild) {
        tabla.removeChild(tabla.firstChild);
      }
  
      empleados.forEach(emp => {
        const tr = document.createElement("tr");
  
        tr.innerHTML = `
          <td>${emp.nombre}</td>
          <td>${emp.correo}</td>
          <td>${emp.puesto}</td>
          <td>${emp.fecha_ingreso}</td>
          <td>
            <img src="${emp.imagen}" alt="${emp.nombre}" width="60" loading="lazy" onerror="this.src='fotos/default.jpg'">
          </td>
          <td>
            <button class="btn btn-sm btn-warning me-2" onclick='editarEmpleado(${JSON.stringify(emp)})'>✏️</button>
            <button class="btn btn-sm btn-danger" onclick='eliminarEmpleado(${emp.id})'>🗑️</button>
          </td>
        `;
  
        tabla.appendChild(tr);
      });
  
      if (empleados.length === 0) {
        const emptyRow = document.createElement("tr");
        emptyRow.innerHTML = `<td colspan="6" class="text-center text-muted py-3">No hay empleados registrados.</td>`;
        tabla.appendChild(emptyRow);
      }
  
    } catch (error) {
      tabla.innerHTML = `<tr><td colspan="6" class="text-center text-danger">Error al cargar empleados</td></tr>`;
      console.error(error);
    }
  }
  
  
  

  window.editarEmpleado = (emp) => {
    form.nombre.value = emp.nombre;
    form.correo.value = emp.correo;
    form.puesto.value = emp.puesto;
    form.fecha_ingreso.value = emp.fecha_ingreso;
    editId = emp.id;
    imagenActual = emp.imagen;
  };

  window.eliminarEmpleado = async (id) => {
    const confirm = await Swal.fire({
      title: "¿Eliminar?",
      text: "Esta acción no se puede deshacer",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Sí, eliminar",
    });

    if (confirm.isConfirmed) {
      const res = await fetch("eliminar_empleado.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ id }),
      });

      const data = await res.json();

      if (data.success) {
        Swal.fire("Eliminado", "Empleado eliminado correctamente", "success");
        cargarEmpleados();
      } else {
        Swal.fire("Error", data.error || "No se pudo eliminar", "error");
      }
    }
  };
});
