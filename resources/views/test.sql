DROP PROCEDURE IF EXISTS ierpFM.SP_GENERATE_FM_REPORT;
CREATE PROCEDURE ierpFM.⁠ SP_GENERATE_FM_REPORT ⁠(IN S_REP VARCHAR(100), IN D_START DATE, IN D_END DATE, IN S_ARID_FROM VARCHAR(50), IN S_ARID_TO VARCHAR(50), IN S_TRXUSR VARCHAR(50))
BEGIN
    
    DECLARE ldt_DATE_START DATE;
    DECLARE ldt_DATE_END DATE;
    DECLARE ldt_PREV_FIRST_DATE DATE;
    DECLARE ldt_PREV_DATE DATE;
    DECLARE ldt_DATE DATE;
    DECLARE ldt_FINDATE_START DATE;
    DECLARE ldt_FINDATE_END DATE;
    DECLARE ls_REP_MTH VARCHAR(10);  
    DECLARE ls_REP_YEAR VARCHAR(10);
    DECLARE ll_CNT INT(10);
    
    CASE  S_REP
      WHEN 'AR_LEDGER' THEN 
          call ierpFM.SP_GENERATE_AR_LEDGER_REPORT(D_START, D_END, S_ARID_FROM, S_ARID_TO, S_TRXUSR); 
      WHEN 'AP_LEDGER' THEN 
          call ierpFM.SP_GENERATE_AP_LEDGER_REPORT(D_START, D_END, S_ARID_FROM, S_ARID_TO, S_TRXUSR); 
      WHEN 'GL_LEDGER' THEN 
          call ierpFM.SP_GENERATE_GL_LEDGER_REPORT(D_START, D_END, S_ARID_FROM, S_ARID_TO, S_TRXUSR);     
      WHEN 'AP_AGING' THEN 
          call ierpFM.SP_GENERATE_AP_AGING_REPORT(S_REP, D_START, D_END, S_ARID_FROM, S_ARID_TO, S_TRXUSR); 
      WHEN 'CREDITOR_AGING' THEN 
          call ierpFM.SP_GENERATE_AP_AGING_REPORT(S_REP, D_START, D_END, S_ARID_FROM, S_ARID_TO, S_TRXUSR);
      WHEN 'AR_AGING' THEN 
          call ierpFM.SP_GENERATE_AR_AGING_REPORT(S_REP, D_START, D_END, S_ARID_FROM, S_ARID_TO, S_TRXUSR); 
      WHEN 'AR_STMT' THEN 
          call ierpFM.SP_GENERATE_AR_STATEMENT_DT_OS(D_START, D_END, S_ARID_FROM, S_ARID_TO, S_TRXUSR);
          call ierpFM.SP_GENERATE_AR_STATEMENT_HDR(D_START, D_END, S_ARID_FROM, S_ARID_TO, S_TRXUSR); 
          call ierpFM.SP_GENERATE_AR_STATEMENT_DT(D_START, D_END, S_ARID_FROM, S_ARID_TO, S_TRXUSR);          
      WHEN 'STKCLS' THEN   
          -- Call ierpSM.SP_GENERATE_STKCLOSING_COST(S_REP, D_START, D_END, S_TRXUSR);
          Call ierpSM.SP_GENERATE_STK_CLOSING_REPORT(S_REP, D_START, D_END, S_TRXUSR);        
      WHEN 'TB' THEN
         
          -- select month(subdate(datefrom, INTERVAL 1 MONTH)) as REP_MTH, year(subdate(datefrom, INTERVAL 1 MONTH)) as REP_YEAR, datefrom, dateto
          select month(subdate(D_START, INTERVAL 1 MONTH)) as REP_MTH, year(subdate(D_START, INTERVAL 1 MONTH)) as REP_YEAR, datefrom, dateto
          into ls_REP_MTH, ls_REP_YEAR, ldt_FINDATE_START, ldt_FINDATE_END 
          from 
          (
          select ⁠ from ⁠ as datefrom, ⁠ to ⁠ as dateto 
          from ierpadmin.finance_date
          where D_START between convert(⁠ from ⁠,date) and convert(⁠ to ⁠,date) 
          ) TblFinance
          ;

          Call ierpFM.SP_GENERATE_TB_REPORT(S_REP, ls_REP_MTH, ls_REP_YEAR, D_START, D_END, S_TRXUSR);  
          
      WHEN 'MA' THEN 
          DELETE from ierpFM.TEMP_FMSTD_REPORT 
          WHERE Report_ID in ('PNL', 'BS', 'MA') 
          and TRXUSRID = S_TRXUSR ;
          
          DELETE from ierpSM.TEMP_MNFG_ACC 
          where TEMP_TRXUSRID = S_TRXUSR;
                     
          select date_add(LAST_DAY(convert(now(),date)),interval -DAY(LAST_DAY(convert(now(),date)))+1 DAY) AS first_day, 
                 LAST_DAY(convert(now(),date)),
                 date_add(LAST_DAY(DATE_SUB(LAST_DAY(convert(now(),date)), INTERVAL +1 MONTH)),interval -DAY(LAST_DAY(DATE_SUB(LAST_DAY(convert(now(),date)), INTERVAL +1 MONTH)))+1 DAY) AS first_day_prevmth, 
                 LAST_DAY(DATE_SUB(LAST_DAY(convert(now(),date)), INTERVAL +1 MONTH))
                 -- DATE_SUB(LAST_DAY(convert(now(),date)), INTERVAL +1 MONTH)
          into ldt_DATE_START, ldt_DATE_END, ldt_PREV_FIRST_DATE, ldt_PREV_DATE
          From ierpSM.MTN_CO;       
          
          -- Same current month
          IF ldt_DATE_START = D_START and ldt_DATE_END = D_END THEN
            --  Call ierpSM.SP_GENERATE_STK_CLOSING_REPORT(S_REP, ldt_PREV_FIRST_DATE, ldt_PREV_DATE, S_TRXUSR);
              Call ierpSM.SP_GENERATE_STK_CLOSING_REPORT(S_REP, D_START, D_END, S_TRXUSR);
      
              select convert(TEMP_DATE,date), count(*) as cnt
              into ldt_DATE, ll_CNT
              from ierpSM.TEMP_MNFG_ACC 
              where convert(TEMP_START_DATE,date) = ldt_DATE_START 
              and convert(TEMP_END_DATE,date) = ldt_DATE_END
              and TEMP_TRXUSRID = S_TRXUSR
              group by convert(TEMP_DATE,date);
              
              IF ll_CNT is not null Then 
                 IF ldt_DATE <> convert(now(),date) THEN
                     DELETE from ierpSM.TEMP_MNFG_ACC 
                     where convert(TEMP_START_DATE,date) = ldt_DATE_START 
                     and convert(TEMP_END_DATE,date) = ldt_DATE_END
                     and TEMP_TRXUSRID = S_TRXUSR;
                     
                     Call ierpFM.SP_GENERATE_MANFACCT_DATA( S_REP, ldt_DATE_START, ldt_DATE_END, S_TRXUSR);     
                 END IF;
              ELSE
                Call ierpFM.SP_GENERATE_MANFACCT_DATA( S_REP, ldt_DATE_START, ldt_DATE_END, S_TRXUSR);  
              END IF;  
              
          ELSEIF D_START < ldt_DATE_START THEN
              
                select ⁠ from ⁠ as datefrom, ⁠ to ⁠ as dateto 
                into ldt_FINDATE_START, ldt_FINDATE_END 
                from ierpadmin.finance_date
                where D_START between convert(⁠ from ⁠,date) and convert(⁠ to ⁠,date) ;
                
                DELETE from ierpSM.TEMP_MNFG_ACC 
                where convert(TEMP_START_DATE,date) >= ldt_FINDATE_START 
                and convert(TEMP_END_DATE,date) <= D_END
                and TEMP_TRXUSRID = S_TRXUSR;
                
                Call ierpFM.SP_GENERATE_MANFACCT_DATA( S_REP, ldt_FINDATE_START, D_END, S_TRXUSR);  
--           ELSE
--               --  Call ierpSM.SP_GENERATE_STK_CLOSING_REPORT(S_REP, ldt_PREV_FIRST_DATE, ldt_PREV_DATE, S_TRXUSR);
--                 Call ierpSM.SP_GENERATE_STK_CLOSING_REPORT(S_REP, D_START, D_END, S_TRXUSR);
--                
--                 DELETE from ierpSM.TEMP_MNFG_ACC 
--                 where convert(TEMP_START_DATE,date) >= D_START 
--                 and convert(TEMP_END_DATE,date) <= D_END
--                 and TEMP_TRXUSRID = S_TRXUSR;
--                
--                 Call ierpFM.SP_GENERATE_MANFACCT_DATA(S_REP, D_START, D_END, S_TRXUSR);
          END IF;
          
          Call ierpFM.SP_GENERATE_MANFACCT_REPORT(S_REP, D_START, D_END, S_TRXUSR);  
          Call ierpFM.SP_GENERATE_PNL_REPORT('PNL', D_START, D_END, S_TRXUSR); 
          Call ierpFM.SP_GENERATE_BS_REPORT('BS', D_START, D_END, S_TRXUSR);
          
      WHEN 'PNL' THEN  
          DELETE from ierpFM.TEMP_FMSTD_REPORT 
          WHERE Report_ID in ('PNL', 'BS', 'MA') 
          and TRXUSRID = S_TRXUSR ;
          
          DELETE from ierpSM.TEMP_MNFG_ACC 
          where TEMP_TRXUSRID = S_TRXUSR;
          
          select date_add(LAST_DAY(convert(now(),date)),interval -DAY(LAST_DAY(convert(now(),date)))+1 DAY) AS first_day, 
                 LAST_DAY(convert(now(),date)),
                 date_add(LAST_DAY(DATE_SUB(LAST_DAY(convert(now(),date)), INTERVAL +1 MONTH)),interval -DAY(LAST_DAY(DATE_SUB(LAST_DAY(convert(now(),date)), INTERVAL +1 MONTH)))+1 DAY) AS first_day_prevmth, 
                 LAST_DAY(DATE_SUB(LAST_DAY(convert(now(),date)), INTERVAL +1 MONTH))
                 -- DATE_SUB(LAST_DAY(convert(now(),date)), INTERVAL +1 MONTH)
          into ldt_DATE_START, ldt_DATE_END, ldt_PREV_FIRST_DATE, ldt_PREV_DATE
          From ierpSM.MTN_CO;       
          
          IF ldt_DATE_START = D_START and ldt_DATE_END = D_END THEN
             -- Call ierpSM.SP_GENERATE_STK_CLOSING_REPORT(S_REP, ldt_PREV_FIRST_DATE, ldt_PREV_DATE, S_TRXUSR);
              Call ierpSM.SP_GENERATE_STK_CLOSING_REPORT(S_REP, D_START, D_END, S_TRXUSR);
              
              select convert(TEMP_DATE,date), count(*) as cnt
              into ldt_DATE, ll_CNT
              from ierpSM.TEMP_MNFG_ACC 
              where convert(TEMP_START_DATE,date) = ldt_DATE_START 
              and convert(TEMP_END_DATE,date) = ldt_DATE_END
              and TEMP_TRXUSRID = S_TRXUSR
              group by convert(TEMP_DATE,date);
              
              IF ll_CNT is not null Then 
                 IF ldt_DATE <> convert(now(),date) THEN
                     DELETE from ierpSM.TEMP_MNFG_ACC 
                     where convert(TEMP_START_DATE,date) = ldt_DATE_START 
                     and convert(TEMP_END_DATE,date) = ldt_DATE_END
                     and TEMP_TRXUSRID = S_TRXUSR;
                     
                     Call ierpFM.SP_GENERATE_MANFACCT_DATA(S_REP, ldt_DATE_START, ldt_DATE_END, S_TRXUSR);     
                 END IF;
              ELSE
                Call ierpFM.SP_GENERATE_MANFACCT_DATA(S_REP, ldt_DATE_START, ldt_DATE_END, S_TRXUSR);  
              END IF;  
              
          ELSEIF D_START < ldt_DATE_START THEN
              
                select ⁠ from ⁠ as datefrom, ⁠ to ⁠ as dateto 
                into ldt_FINDATE_START, ldt_FINDATE_END 
                from ierpadmin.finance_date
                where D_START between convert(⁠ from ⁠,date) and convert(⁠ to ⁠,date) ;
                
                DELETE from ierpSM.TEMP_MNFG_ACC 
                where convert(TEMP_START_DATE,date) >= ldt_FINDATE_START 
                and convert(TEMP_END_DATE,date) <= D_END
                and TEMP_TRXUSRID = S_TRXUSR;
                
                Call ierpFM.SP_GENERATE_MANFACCT_DATA( S_REP, ldt_FINDATE_START, D_END, S_TRXUSR);   
--           ELSE
--               -- Call ierpSM.SP_GENERATE_STK_CLOSING_REPORT(S_REP, ldt_PREV_FIRST_DATE, ldt_PREV_DATE, S_TRXUSR);
--                Call ierpSM.SP_GENERATE_STK_CLOSING_REPORT(S_REP, D_START, D_END, S_TRXUSR);
--               
--                DELETE from ierpSM.TEMP_MNFG_ACC 
--                where convert(TEMP_START_DATE,date) >= D_START 
--                and convert(TEMP_END_DATE,date) <= D_END
--                and TEMP_TRXUSRID = S_TRXUSR;
--                
--                Call ierpFM.SP_GENERATE_MANFACCT_DATA( S_REP, D_START, D_END, S_TRXUSR);
          END IF;
          
          Call ierpFM.SP_GENERATE_MANFACCT_REPORT('MA', D_START, D_END, S_TRXUSR); 
          Call ierpFM.SP_GENERATE_PNL_REPORT(S_REP, D_START, D_END, S_TRXUSR); 
          Call ierpFM.SP_GENERATE_BS_REPORT('BS', D_START, D_END, S_TRXUSR);
          
        WHEN 'BS' THEN 
          DELETE from ierpFM.TEMP_FMSTD_REPORT 
          WHERE Report_ID in ('PNL', 'BS', 'MA') 
          and TRXUSRID = S_TRXUSR ; 
          
          DELETE from ierpSM.TEMP_MNFG_ACC 
          where TEMP_TRXUSRID = S_TRXUSR;
          
          select date_add(LAST_DAY(convert(now(),date)),interval -DAY(LAST_DAY(convert(now(),date)))+1 DAY) AS first_day, 
                 LAST_DAY(convert(now(),date)),
                 date_add(LAST_DAY(DATE_SUB(LAST_DAY(convert(now(),date)), INTERVAL +1 MONTH)),interval -DAY(LAST_DAY(DATE_SUB(LAST_DAY(convert(now(),date)), INTERVAL +1 MONTH)))+1 DAY) AS first_day_prevmth, 
                 LAST_DAY(DATE_SUB(LAST_DAY(convert(now(),date)), INTERVAL +1 MONTH))
                 -- DATE_SUB(LAST_DAY(convert(now(),date)), INTERVAL +1 MONTH)
          into ldt_DATE_START, ldt_DATE_END, ldt_PREV_FIRST_DATE, ldt_PREV_DATE
          From ierpSM.MTN_CO;       
          
          
          IF ldt_DATE_START = D_START and ldt_DATE_END = D_END THEN
             -- Call ierpSM.SP_GENERATE_STK_CLOSING_REPORT(S_REP, ldt_PREV_FIRST_DATE, ldt_PREV_DATE, S_TRXUSR);
              Call ierpSM.SP_GENERATE_STK_CLOSING_REPORT(S_REP, D_START, D_END, S_TRXUSR);
              
              select convert(TEMP_DATE,date), count(*) as cnt
              into ldt_DATE, ll_CNT
              from ierpSM.TEMP_MNFG_ACC 
              where convert(TEMP_START_DATE,date) = ldt_DATE_START 
              and convert(TEMP_END_DATE,date) = ldt_DATE_END
              and TEMP_TRXUSRID = S_TRXUSR
              group by convert(TEMP_DATE,date);
              
              IF ll_CNT is not null Then 
                 IF ldt_DATE <> convert(now(),date) THEN
                     DELETE from ierpSM.TEMP_MNFG_ACC 
                     where convert(TEMP_START_DATE,date) = ldt_DATE_START 
                     and convert(TEMP_END_DATE,date) = ldt_DATE_END
                     and TEMP_TRXUSRID = S_TRXUSR;
                     
                     Call ierpFM.SP_GENERATE_MANFACCT_DATA( S_REP, ldt_DATE_START, ldt_DATE_END, S_TRXUSR);     
                 END IF;
              ELSE
                Call ierpFM.SP_GENERATE_MANFACCT_DATA( S_REP, ldt_DATE_START, ldt_DATE_END, S_TRXUSR);  
              END IF;  
              
          ELSEIF D_START < ldt_DATE_START THEN
                select ⁠ from ⁠ as datefrom, ⁠ to ⁠ as dateto 
                into ldt_FINDATE_START, ldt_FINDATE_END 
                from ierpadmin.finance_date
                where D_START between convert(⁠ from ⁠,date) and convert(⁠ to ⁠,date) ;
                
                DELETE from ierpSM.TEMP_MNFG_ACC 
                where convert(TEMP_START_DATE,date) >= ldt_FINDATE_START 
                and convert(TEMP_END_DATE,date) <= D_END
                and TEMP_TRXUSRID = S_TRXUSR;
                
                Call ierpFM.SP_GENERATE_MANFACCT_DATA( S_REP, ldt_FINDATE_START, D_END, S_TRXUSR);  
--           ELSE
--               -- Call ierpSM.SP_GENERATE_STK_CLOSING_REPORT(S_REP, ldt_PREV_FIRST_DATE, ldt_PREV_DATE, S_TRXUSR);
--                Call ierpSM.SP_GENERATE_STK_CLOSING_REPORT(S_REP, D_START, D_END, S_TRXUSR);
--               
--                DELETE from ierpSM.TEMP_MNFG_ACC 
--                where convert(TEMP_START_DATE,date) >= D_START 
--                and convert(TEMP_END_DATE,date) <= D_END
--                and TEMP_TRXUSRID = S_TRXUSR;
--                
--                Call ierpFM.SP_GENERATE_MANFACCT_DATA( S_REP, D_START, D_END, S_TRXUSR);
          END IF;
          
          
          Call ierpFM.SP_GENERATE_MANFACCT_REPORT('MA', D_START, D_END, S_TRXUSR);  
          Call ierpFM.SP_GENERATE_PNL_REPORT('PNL', D_START, D_END, S_TRXUSR); 
          Call ierpFM.SP_GENERATE_BS_REPORT(S_REP, D_START, D_END, S_TRXUSR);              
  
      END CASE; 
      
  END;