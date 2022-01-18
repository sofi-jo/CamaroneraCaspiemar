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


SELECT rc.idregistroCostosIndirectos, c.nombre, rc.fecha'Fecha', rc.totalCostoIndirecto'Total'
FROM registrocostosindirectos rc
INNER JOIN registrocostosindirectos_has_costosindirectos r ON r.registroCostosIndirectos_idregistroCostosIndirectos = rc.idregistroCostosIndirectos
INNER JOIN costosindirectos c ON c.idcostosIndirectos = r.costosIndirectos_idcostosIndirectos
WHERE rc.fase_idFase = 1;

SELECT *
FROM registrocostosindirectos_has_costosindirectos;

SELECT *
FROM registromateriaprima;