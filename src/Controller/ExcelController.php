<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Entity\Cliente;

class ExcelController extends AbstractController
{

    /**
     * @Route("/admin/excel/cliente/{id}", name="excel")
     */
    public function downloadExcel($id)
    {
        
        $registro = $this->getDoctrine()->getRepository(Cliente::class)->find($id);

        $spreadsheet = new Spreadsheet();
        
        /* @var $sheet \PhpOffice\PhpSpreadsheet\Writer\Xlsx\Worksheet */
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Género');
        $sheet->setCellValue('A2', $registro->getUnGenero()->getNombre());

        $sheet->setCellValue('B1', 'Nombre Completo');
        $sheet->setCellValue('B2', $registro->getNombre() . ' ' . $registro->getApellido());

        $sheet->setCellValue('C1', 'Número de teléfono');
        $sheet->setCellValue('C2', $registro->getTelefono());

        $sheet->setCellValue('D1', 'Número de identificación');
        $sheet->setCellValue('D2', $registro->getDni());

        $sheet->setCellValue('E1', 'Correo electrónico');
        $sheet->setCellValue('E2', $registro->getCorreo());

        $sheet->setCellValue('F1', 'Nacimiento');
        $sheet->setCellValue('F2', $registro->getFechaNacimiento());

        //Informacion de Consulta

        $sheet->setCellValue('G1', 'Motivo de consulta');
        $sheet->setCellValue('G2', $registro->getUnaFicha()->getUnaInformacionConsulta()->getUnMotivoConsulta()->getNombre());

        $sheet->setCellValue('H1', 'Expectativas');
        $sheet->setCellValue('H2', $registro->getUnaFicha()->getUnaInformacionConsulta()->getExpectativa());

        $sheet->setCellValue('I1', 'Fumador');
        $sheet->setCellValue('I2', $registro->getFumador());

        $sheet->setCellValue('J1', 'Bebe alcohol');
        $sheet->setCellValue('J2', $registro->getBebedor());

        //Historia Personal

        $sheet->setCellValue('K1', 'Calidad del sueño');
        $sheet->setCellValue('K2', $registro->getUnaFicha()->getUnaHistoriaPersonal()->getUnCiclo()->getNombre());

        $sheet->setCellValue('L1', 'Actividad física');
        $sheet->setCellValue('L2', $registro->getActividadFisica());

        $sheet->setCellValue('M1', 'Información adicional sobre la actividad física');
        $sheet->setCellValue('M2', $registro->getUnaFicha()->getUnaHistoriaPersonal()->getQueActividad() . '-' . $registro->getUnaFicha()->getUnaHistoriaPersonal()->getCuandoCuantas());

        $sheet->setCellValue('N1', 'Función intestinal');
        $sheet->setCellValue('N2', $registro->getUnaFicha()->getUnaHistoriaPersonal()->getUnaFuncionIntestinal()->getNombre());

        //Historia Alimentaria

        $sheet->setCellValue('O1', 'Alimentos favoritos');
        $sheet->setCellValue('O2', $registro->getUnaFicha()->getUnaHistoriaAlimentaria()->getAlimentoFavorito());

        $sheet->setCellValue('P1', 'Alimentos rechazados');
        $sheet->setCellValue('P2', $registro->getUnaFicha()->getUnaHistoriaAlimentaria()->getAlimentoRechazado());

        $sheet->setCellValue('P1', 'Alergias e intolerancias');
        $sheet->setCellValue('P2', $registro->getUnaFicha()->getUnaHistoriaAlimentaria()->getAlergiaIntolerancia());

        $sheet->setCellValue('Q1', 'Otras informaciones');
        $sheet->setCellValue('Q2', $registro->getUnaFicha()->getUnaHistoriaAlimentaria()->getOtrasAclaraiones());

        $sheet->setCellValue('Q1', 'Ingesta de agua');
        $sheet->setCellValue('Q2', $registro->getUnaFicha()->getUnaHistoriaAlimentaria()->getUnAgua()->getNombre());

        //Mediciones

        $sheet->setCellValue('R1', 'Peso');
        $sheet->setCellValue('R2', $registro->getUnaFicha()->getUnaMedicion()->getPeso());

        $sheet->setCellValue('S1', 'Altura');
        $sheet->setCellValue('S2', $registro->getUnaFicha()->getUnaMedicion()->getAltura());

        //Historia Clinica

        $sheet->setCellValue('R1', 'Patologías');
        $sheet->setCellValue('R2', $registro->getPatologias());

        $sheet->setCellValue('S1', 'Medicación');
        $sheet->setCellValue('S2', $registro->getMedicamentos());

        $sheet->setCellValue('T1', 'Antecedentes Familiares');
        $sheet->setCellValue('T2', $registro->getUnaFicha()->getUnaHistoriaClinica()->getAntecedente());


        //mediciones

        $sheet->setCellValue('S1', 'Peso');
        $sheet->setCellValue('S2', $registro->getUnaFicha()->getUnaMedicion()->getPeso());

        $sheet->setCellValue('T1', 'Altura');
        $sheet->setCellValue('T2', $registro->getUnaFicha()->getUnaMedicion()->getAltura());

        //Agregar cambio de estado en ficha descagada

        
        // Create your Office 2007 Excel (XLSX Format)
        $writer = new Xlsx($spreadsheet);
        
        // Create a Temporary file in the system
        $fileName = 'Cliente-' . $registro->getNombre() . '-' . $registro->getApellido() .'.xlsx';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        
        // Create the excel file in the tmp directory of the system
        $writer->save($temp_file);
        
        // Return the excel file as an attachment
        return $this->file($temp_file, $fileName, ResponseHeaderBag::DISPOSITION_INLINE);
    }
}
