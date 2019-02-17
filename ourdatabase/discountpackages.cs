using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace New
{
    #region Discountpackages
    public class Discountpackages
    {
        #region Member Variables
        protected int _idDiscount;
        protected unknown _discountValue;
        protected unknown _disStartDate;
        protected unknown _disEndDate;
        protected int _pkgId_fk;
        #endregion
        #region Constructors
        public Discountpackages() { }
        public Discountpackages(unknown discountValue, unknown disStartDate, unknown disEndDate, int pkgId_fk)
        {
            this._discountValue=discountValue;
            this._disStartDate=disStartDate;
            this._disEndDate=disEndDate;
            this._pkgId_fk=pkgId_fk;
        }
        #endregion
        #region Public Properties
        public virtual int IdDiscount
        {
            get {return _idDiscount;}
            set {_idDiscount=value;}
        }
        public virtual unknown DiscountValue
        {
            get {return _discountValue;}
            set {_discountValue=value;}
        }
        public virtual unknown DisStartDate
        {
            get {return _disStartDate;}
            set {_disStartDate=value;}
        }
        public virtual unknown DisEndDate
        {
            get {return _disEndDate;}
            set {_disEndDate=value;}
        }
        public virtual int PkgId_fk
        {
            get {return _pkgId_fk;}
            set {_pkgId_fk=value;}
        }
        #endregion
    }
    #endregion
}