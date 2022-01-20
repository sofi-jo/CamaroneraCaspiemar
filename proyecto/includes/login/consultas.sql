# materia prima cosecha

SELECT idRegistroMateriaPrima, m.nombre'Nombre', fecha'FECHA', cantidad'Cantidad', costoUnitario'Costo Unitario',
Total'Total' 
FROM registromateriaprima rm
INNER JOIN registromateriaprima_has_materiaprima r ON r.registroMateriaPrima_idregistroMateriaPrima = rm.idregistroMateriaPrima
INNER JOIN materiaprima m ON m.idmateriaprima  = r.materiaPrima_idmateriaPrima
WHERE rm.fase_idFase = 1;

SELECT *
FROM registromateriaprima;

SELECT max(idregistroMateriaPrima)
From registromateriaprima;
SELECT *
FROM materiaprima;

SELECT *
FROM registromateriaprima_has_materiaprima;

SELECT *
FROM registrocostosindirectos;


SELECT rc.idregistroCostosIndirectos, c.nombre, r.fecha'Fecha', r.totalCostoIndirecto'Total'
FROM registrocostosindirectos rc
INNER JOIN registrocostosindirectos_has_costosindirectos r ON r.registroCostosIndirectos_idregistroCostosIndirectos = rc.idregistroCostosIndirectos
INNER JOIN costosindirectos c ON c.idcostosIndirectos = r.costosIndirectos_idcostosIndirectos
WHERE ( rm.Fase_idFase % 2 ) != 0;

SELECT idRegistroMateriaPrima, m.nombre'Nombre', fecha'FECHA', cantidad'Cantidad', costoUnitario'Costo Unitario',
    totatl'Total' 
    FROM registromateriaprima rm
    INNER JOIN registromateriaprima_has_materiaprima r ON r.registroMateriaPrima_idregistroMateriaPrima = rm.idregistroMateriaPrima
    INNER JOIN materiaprima m ON m.idmateriaprima  = r.materiaPrima_idmateriaPrima
    WHERE ( rm.Fase_idFase % 2 ) != 0;
    
SELECT *
FROM registrocostosindirectos_has_costosindirectos;

SELECT *
FROM registromateriaprima;


SELECT *
FROM arealaboral_has_registro_mano_obre, registrocostosindirectos_has_costosindirectos , registromateriaprima_has_materiaprima rm
WHERE rm.fecha BETWEEN "2022-01-01" AND "2022-01-30";

#reporte de materia prima
SELECT m.nombre'Nombre', cantidad'Cantidad', costoUnitario'Costo Unitario',totatl'Total' 
FROM registromateriaprima_has_materiaprima as rm
INNER JOIN materiaprima m ON m.idmateriaprima  = rm.materiaPrima_idmateriaPrima
WHERE rm.fecha BETWEEN "2022-01-01" AND "2022-01-30";

#reporte de materia prima
SELECT c.nombre'Nombre', c.tipo'Descripción',totalCostoIndirecto'Total' 
FROM registrocostosindirectos_has_costosindirectos rc
INNER JOIN costosindirectos c ON c.idcostosIndirectos  = rc.costosIndirectos_idcostosIndirectos
WHERE rc.fecha BETWEEN "2022-01-01" AND "2022-01-30";

#reporte de todos
SELECT c.nombre'Nombre', c.tipo'Descripción',totalCostoIndirecto'Total' 
FROM registrocostosindirectos_has_costosindirectos rc, registromateriaprima_has_materiaprima rm
INNER JOIN costosindirectos c ON c.idcostosIndirectos  = rc.costosIndirectos_idcostosIndirectos
INNER JOIN materiaprima m ON m.idmateriaprima  = rm.materiaPrima_idmateriaPrima
WHERE rc.fecha BETWEEN "2022-01-01" AND "2022-01-30";



